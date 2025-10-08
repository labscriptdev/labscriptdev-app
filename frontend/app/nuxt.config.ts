// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: "2025-07-15",
  devtools: { enabled: true },
  ssr: false,

  runtimeConfig: {
    public: {
      SERVICE_BACKEND_URL: process.env.SERVICE_BACKEND_URL,
      SERVICE_KEYCLOAK_REALM: process.env.SERVICE_KEYCLOAK_REALM,
      SERVICE_KEYCLOAK_CLIENT: process.env.SERVICE_KEYCLOAK_CLIENT,
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
