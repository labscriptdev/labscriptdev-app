// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: "2025-07-15",
  devtools: { enabled: true },
  ssr: false,

  runtimeConfig: {
    public: {
      SERVICE_BACKEND_URL: process.env.SERVICE_BACKEND_URL,
    },
  },

  modules: [
    ["@nuxt/icon", {}],
    ["@nuxt/scripts", {}],
    [
      "vuetify-nuxt-module",
      {
        vuetifyOptions: {
          theme: {
            defaultTheme: "dark",
          },
        },
      },
    ],
    "@pinia/nuxt",
  ],
});
