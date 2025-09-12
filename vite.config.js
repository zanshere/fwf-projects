import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    // bind to IPv4 loopback to avoid browsers preferring ::1 (IPv6)
    host: '127.0.0.1',
    port: 5173,
    strictPort: true, // don't pick another port automatically (helps predictable HMR ports)
    hmr: {
      protocol: 'ws',
      host: '127.0.0.1',
      port: 5173,
      clientPort: 5173,
    },
    watch: {
      // use polling in environments where file changes are missed (VMs, WSL, network FS)
      usePolling: true,
      interval: 100,
    },
  },
  plugins: [
    laravel({
      input: ['resources/js/app.js', 'resources/css/app.css'],
      refresh: true,
    }),
  ],
});
