import Keycloak from "keycloak-js";
import axios from "axios";

export default () => {
  const r = defineStore("useApp", () => {
    const conf = useRuntimeConfig();
    console.log(conf);

    const meta = reactive({
      keycloak: null,
      authInit: false,
      auth: false,
    });

    return reactive({
      ready: false,
      busy: false,
      user: null,
      config: {},

      async login() {
        await meta.keycloak.login({ redirectUri: location.href });
      },

      async logout() {
        await meta.keycloak.logout({ redirectUri: `${location.origin}/` });
      },

      async init() {
        r.busy = true;
        await r.initKeycloak();
        await r.initData();
        r.busy = false;
        r.ready = true;
      },

      async initKeycloak() {
        try {
          if (!meta.keycloak) {
            meta.keycloak = new Keycloak({
              url: "http://localhost:8080",
              realm: conf.public.SERVICE_KEYCLOAK_REALM,
              clientId: conf.public.SERVICE_KEYCLOAK_CLIENT_PUBLIC,
            });
          }

          if (!meta.authInit) {
            meta.authInit = true;
            meta.auth = await meta.keycloak.init({
              onLoad: "check-sso",
              pkceMethod: "S256",
              checkLoginIframe: false,
            });
          }

          if (meta.auth) {
            r.user = {
              email: meta.keycloak.tokenParsed.email,
              name: meta.keycloak.tokenParsed.name,
            };
          }
        } catch (e) {
          console.log(e);
        }
      },

      async initData() {
        try {
          const { data } = await axios.get("backend://api/app/load");
          r.config = data.config;
        } catch (_) {}
      },
    });
  })();

  return r;
};
