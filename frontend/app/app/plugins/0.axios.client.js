import axios from "axios";

export default defineNuxtPlugin(async (nuxtApp) => {
  axios.interceptors.request.use((config) => {
    const conf = useRuntimeConfig();

    if (config.url && config.url.startsWith("backend://")) {
      config.url = config.url.replace(/^backend:\/+/g, "/");
      config.url =
        conf.public.SERVICE_BACKEND_URL.replace(/\\$/, "") + config.url;

      const backend_token = localStorage.getItem("backend_token") || null;
      if (backend_token) {
        config.headers["Authorization"] = `Bearer ${backend_token}`;
      }
    }

    return config;
  });

  // nuxtApp.provide('axios', axios);
});
