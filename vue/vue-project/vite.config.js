import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue({
      compilerOptions: {
        isCustomElement: (tag) => tag.startsWith('lord-')
      }
    }),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  // vueCustomBlockTransforms: {
  //   // Exclude lord-icon from component resolution
  //   'lord-icon': false
  // },
  optimizeDeps: {
    include: ['lord-icon']
  },
  server: {
    port: 4000
  } 
})
