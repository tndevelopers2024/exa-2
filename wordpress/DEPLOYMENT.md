# Automatic updates on Hostinger

The GitHub Actions workflow deploys `wordpress/exa-home-services/` on pushes to `main`. It updates the installed theme only. WordPress pages, saved prices, phone settings, plugins, and uploaded media remain in WordPress.

## One-time connection

1. In Hostinger, open the website dashboard → **Advanced → SSH Access** and enable SSH.
2. Create a dedicated SSH key pair for deployment. Add the public key to Hostinger; keep the private key out of Git and chat.
3. Confirm the absolute path of the installed theme using Hostinger File Manager or SSH. It will end in `/public_html/wp-content/themes/exa-home-services`. Use the actual account/domain path, not a guessed path.
4. Verify the SSH server's host key fingerprint through a trusted Hostinger SSH connection. Save the matching `known_hosts` entry, including `[host]:port` when using a nonstandard port.
5. In GitHub → repository **Settings → Secrets and variables → Actions**, add these repository secrets:

| Secret | Value |
| --- | --- |
| `HOSTINGER_HOST` | SSH hostname or IP from Hostinger |
| `HOSTINGER_PORT` | SSH port from Hostinger |
| `HOSTINGER_USER` | SSH username from Hostinger |
| `HOSTINGER_SSH_KEY` | Full private deployment key, including header/footer |
| `HOSTINGER_KNOWN_HOSTS` | Verified SSH known-host entry |
| `HOSTINGER_THEME_PATH` | Absolute installed theme directory |

6. Add repository variable `HOSTINGER_DEPLOY_ENABLED` with value `true` when the connection is ready. Before this is set the deploy job is skipped.
7. Open **Actions → Deploy WordPress theme to Hostinger → Run workflow** for the first deployment, then check the live URL.

## Editing and pushing

Edit the files inside `wordpress/exa-home-services/`, commit, and push to `main`. The action validates PHP/JavaScript and uploads the theme. Changes to the root `index.html` alone do not deploy: it remains the separate static preview.

Hostinger must have `rsync` available over SSH. Each deployment saves a compressed copy of the installed theme under `~/.exa-theme-backups/` before upload. Backups accumulate; periodically archive or remove old ones. Deployment uses delayed file replacement but is not an atomic release across the whole theme.

The deployment clears LiteSpeed page cache automatically when its WP-CLI command is available. Theme CSS/JavaScript URLs also include file modification versions. If another CDN or cache is configured separately, clear that cache if necessary.

To roll back, restore the desired backup to the theme folder or revert the Git commit and push again. Saved admin price overrides continue to take precedence over the bundled default price list.
