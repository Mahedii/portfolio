// vite.config.js
import { fileURLToPath, URL } from "node:url";
import { defineConfig } from "file:///D:/xampp/htdocs/portfolio/vue/vue-project/node_modules/vite/dist/node/index.js";
import vue from "file:///D:/xampp/htdocs/portfolio/vue/vue-project/node_modules/@vitejs/plugin-vue/dist/index.mjs";
var __vite_injected_original_import_meta_url = "file:///D:/xampp/htdocs/portfolio/vue/vue-project/vite.config.js";
var vite_config_default = defineConfig({
  plugins: [
    vue()
  ],
  optimizeDeps: {
    include: ["@iconify/iconify", "vue-demi"]
  },
  build: {
    chunkSizeWarningLimit: 2e3
  },
  vue: {
    customElement: {
      // Exclude elements from Vue processing
      ignore: ["lord-icon"]
    }
  },
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", __vite_injected_original_import_meta_url))
    }
  },
  server: {
    port: 4e3
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFx4YW1wcFxcXFxodGRvY3NcXFxccG9ydGZvbGlvXFxcXHZ1ZVxcXFx2dWUtcHJvamVjdFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiRDpcXFxceGFtcHBcXFxcaHRkb2NzXFxcXHBvcnRmb2xpb1xcXFx2dWVcXFxcdnVlLXByb2plY3RcXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0Q6L3hhbXBwL2h0ZG9jcy9wb3J0Zm9saW8vdnVlL3Z1ZS1wcm9qZWN0L3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZmlsZVVSTFRvUGF0aCwgVVJMIH0gZnJvbSAnbm9kZTp1cmwnXG5cbmltcG9ydCB7IGRlZmluZUNvbmZpZyB9IGZyb20gJ3ZpdGUnXG5pbXBvcnQgdnVlIGZyb20gJ0B2aXRlanMvcGx1Z2luLXZ1ZSdcblxuLy8gaHR0cHM6Ly92aXRlanMuZGV2L2NvbmZpZy9cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gIHBsdWdpbnM6IFtcbiAgICB2dWUoKSxcbiAgXSxcbiAgb3B0aW1pemVEZXBzOiB7XG4gICAgaW5jbHVkZTogWydAaWNvbmlmeS9pY29uaWZ5JywgJ3Z1ZS1kZW1pJ10sXG4gIH0sXG4gIGJ1aWxkOiB7XG4gICAgY2h1bmtTaXplV2FybmluZ0xpbWl0OiAyMDAwLFxuICB9LFxuICB2dWU6IHtcbiAgICBjdXN0b21FbGVtZW50OiB7XG4gICAgICAvLyBFeGNsdWRlIGVsZW1lbnRzIGZyb20gVnVlIHByb2Nlc3NpbmdcbiAgICAgIGlnbm9yZTogWydsb3JkLWljb24nXSxcbiAgICB9LFxuICB9LFxuICByZXNvbHZlOiB7XG4gICAgYWxpYXM6IHtcbiAgICAgICdAJzogZmlsZVVSTFRvUGF0aChuZXcgVVJMKCcuL3NyYycsIGltcG9ydC5tZXRhLnVybCkpXG4gICAgfVxuICB9LFxuICBzZXJ2ZXI6IHtcbiAgICBwb3J0OiA0MDAwXG4gIH0gXG59KVxuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUF5VCxTQUFTLGVBQWUsV0FBVztBQUU1VixTQUFTLG9CQUFvQjtBQUM3QixPQUFPLFNBQVM7QUFIcUwsSUFBTSwyQ0FBMkM7QUFNdFAsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDMUIsU0FBUztBQUFBLElBQ1AsSUFBSTtBQUFBLEVBQ047QUFBQSxFQUNBLGNBQWM7QUFBQSxJQUNaLFNBQVMsQ0FBQyxvQkFBb0IsVUFBVTtBQUFBLEVBQzFDO0FBQUEsRUFDQSxPQUFPO0FBQUEsSUFDTCx1QkFBdUI7QUFBQSxFQUN6QjtBQUFBLEVBQ0EsS0FBSztBQUFBLElBQ0gsZUFBZTtBQUFBO0FBQUEsTUFFYixRQUFRLENBQUMsV0FBVztBQUFBLElBQ3RCO0FBQUEsRUFDRjtBQUFBLEVBQ0EsU0FBUztBQUFBLElBQ1AsT0FBTztBQUFBLE1BQ0wsS0FBSyxjQUFjLElBQUksSUFBSSxTQUFTLHdDQUFlLENBQUM7QUFBQSxJQUN0RDtBQUFBLEVBQ0Y7QUFBQSxFQUNBLFFBQVE7QUFBQSxJQUNOLE1BQU07QUFBQSxFQUNSO0FBQ0YsQ0FBQzsiLAogICJuYW1lcyI6IFtdCn0K
