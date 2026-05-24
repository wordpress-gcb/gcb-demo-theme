# gcb-demo-theme

Minimal WordPress theme that ships the demo block schemas used by
[gcb-lite](https://github.com/wordpress-gcb/gutenberg-control-blocks-lite).

This is **not** intended as a production theme. It exists so the live
demo at https://gcb-next-starter.vercel.app/ has a real WordPress
backend to fetch content from.

## What's in here

- `style.css`, `index.php`, `functions.php` — the minimum required for
  WordPress to treat this as a theme.
- `blocks/` — eight block schemas (`block.json` + `block.fields.json`)
  that gcb-lite's `BlockLoader` auto-discovers:
  - `accordion-test`, `accordion-test-item`, `text-image`, `gallery-test`
    (reference blocks)
  - `hero`, `feature-trio`, `feature-item`, `cta` (marketing blocks)

No `render.php` files — every block is rendered by the React frontend
([gcb-next-starter](https://github.com/wordpress-gcb/gcb-next-starter))
via the gcb-lite plugin's component-server contract.

## Deploy

Pushes to `main` auto-deploy to Kinsta via `.github/workflows/deploy.yml`.
That workflow needs five repository secrets configured under
**Settings → Secrets and variables → Actions**:

| Secret              | What it is                                                |
|---------------------|-----------------------------------------------------------|
| `SSH_PRIVATE_KEY`   | Private half of an SSH keypair authorized on Kinsta       |
| `SSH_HOST`          | Kinsta SSH host (e.g. `11.22.33.44`)                       |
| `SSH_PORT`          | Kinsta SSH port (often non-22)                            |
| `SSH_USER`          | Kinsta SSH user                                            |
| `REMOTE_THEME_PATH` | Absolute path on Kinsta, e.g. `/www/site_123/public/wp-content/themes/gcb-demo-theme` |

First-time setup: generate the keypair with `ssh-keygen -t ed25519`,
add the public half to Kinsta's SSH Access panel, paste the private
half into `SSH_PRIVATE_KEY`. Test locally first with `ssh -p $PORT
$USER@$HOST` before relying on the workflow.

## After deployment

1. wp-admin → **Appearance → Themes** → activate **GCB Demo Theme**.
2. Confirm at `https://yoursite/?rest_route=/gcblite/v1/blocks` that the
   eight blocks appear in the response.
3. Author a page using the blocks. The Next.js demo at
   gcb-next-starter.vercel.app fetches that page over the REST API and
   renders it through the matching React components.

## License

GPL-2.0-or-later. See [LICENSE](./LICENSE).
