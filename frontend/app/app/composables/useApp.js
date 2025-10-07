import Keycloak from "keycloak-js";

export default () => {
  const r = defineStore("useApp", () => {
    const meta = reactive({
      keycloak: null,
    });

    return reactive({
      ready: false,
      busy: false,
      user: null,

      async init() {
        r.busy = true;
        await r.initKeycloak();
        r.busy = false;
        r.ready = true;
      },

      async initKeycloak() {
        try {
          if (!meta.keycloak) {
            meta.keycloak = new Keycloak({
              url: "http://localhost:8080",
              realm: "app",
              clientId: "app",
            });
          }

          const auth = await meta.keycloak.init({
            onLoad: "check-sso",
            pkceMethod: "S256",
            checkLoginIframe: false,
          });

          if (auth) {
            r.user = {
              email: meta.keycloak.tokenParsed.email,
              name: meta.keycloak.tokenParsed.name,
            };
          }
        } catch (e) {
          console.log(e);
        }
      },

      async login() {
        await meta.keycloak.login({ redirectUri: location.href });
      },

      async logout() {
        await meta.keycloak.logout({ redirectUri: `${location.origin}/` });
      },
    });
  })();

  return r;
};
