window.Vue = require("vue");

Vue.component(
    "media-manager",
    require(".././components/admin/MediaManager.vue").default
);
//Vue.component('menu-editor', require('.././components/admin/menu/MenuEditor.vue').default);
//Vue.component('menu', require('.././components/admin/menu/Menu.vue').default);
//Vue.component('MenuItems', require('.././components/admin/menu/menu_items.vue').default);

Vue.component(
    "passport-clients",
    require(".././components/passport/Clients.vue").default
);

Vue.component(
    "passport-authorized-clients",
    require(".././components/passport/AuthorizedClients.vue").default
);

Vue.component(
    "passport-personal-access-tokens",
    require(".././components/passport/PersonalAccessTokens.vue").default
);

const app = new Vue({
    el: "#app"
});
