#!/usr/bin/env bash
set -euo pipefail

for setting in HOSTINGER_HOST HOSTINGER_PORT HOSTINGER_USER HOSTINGER_SSH_KEY HOSTINGER_KNOWN_HOSTS HOSTINGER_THEME_PATH; do
  if [[ -z "${!setting:-}" ]]; then
    printf 'Missing deployment secret: %s\n' "$setting" >&2
    exit 1
  fi
done

# Refuse broad destinations: only this existing theme can be updated.
if [[ ! "$HOSTINGER_THEME_PATH" =~ ^/[a-zA-Z0-9_./-]+/wp-content/themes/exa-home-services/?$ ]] || [[ "$HOSTINGER_THEME_PATH" == *'/../'* ]]; then
  echo 'HOSTINGER_THEME_PATH must be the absolute path to wp-content/themes/exa-home-services.' >&2
  exit 1
fi
[[ "$HOSTINGER_HOST" =~ ^[a-zA-Z0-9.-]+$ ]] || exit 1
[[ "$HOSTINGER_USER" =~ ^[a-zA-Z0-9_-]+$ ]] || exit 1
[[ "$HOSTINGER_PORT" =~ ^[0-9]+$ ]] || exit 1

ssh_dir=$(mktemp -d)
trap 'rm -rf "$ssh_dir"' EXIT
chmod 700 "$ssh_dir"
printf '%s\n' "$HOSTINGER_SSH_KEY" > "$ssh_dir/key"
printf '%s\n' "$HOSTINGER_KNOWN_HOSTS" > "$ssh_dir/known_hosts"
chmod 600 "$ssh_dir/key" "$ssh_dir/known_hosts"
ssh_options=(-i "$ssh_dir/key" -p "$HOSTINGER_PORT" -o BatchMode=yes -o StrictHostKeyChecking=yes -o "UserKnownHostsFile=$ssh_dir/known_hosts")
remote="$HOSTINGER_USER@$HOSTINGER_HOST"
theme_path="${HOSTINGER_THEME_PATH%/}"

# Back up the installed theme before changing files. Never touch WP core or uploads.
ssh "${ssh_options[@]}" "$remote" "test -f '$theme_path/style.css' && test -f '$theme_path/functions.php' && command -v rsync >/dev/null && mkdir -p \"\$HOME/.exa-theme-backups\" && tar -czf \"\$HOME/.exa-theme-backups/exa-\$(date -u +%Y%m%dT%H%M%SZ).tar.gz\" -C '$theme_path' ."

# Deliberately retain remote-only files. No database, plugins, or uploads are synced.
rsync -az --delay-updates --exclude='.DS_Store' \
  -e "ssh -i $ssh_dir/key -p $HOSTINGER_PORT -o BatchMode=yes -o StrictHostKeyChecking=yes -o UserKnownHostsFile=$ssh_dir/known_hosts" \
  wordpress/exa-home-services/ "$remote:$theme_path/"
echo 'Theme deployed. Purge LiteSpeed cache if cached pages still show the previous version.'
