// Vuetify
import '@mdi/font/css/materialdesignicons.css'
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";

const defaultTheme = {
    dark: false,
    colors: {
        primary: "#E2001A",
        secondary: "#4C4D56",
    },
};

const darkTheme = {
    dark: true,
    colors: {
        primary: "#E2001A",
        secondary: "#4C4D56",
    },
};

const vuetify = createVuetify({
    defaults: {
        VBtn: {
            variant: 'tonal'
        },
        VTextField: {
            variant: 'outlined'
        },
        VSelect: {
            variant: 'outlined'
        }
    },
    components,
    directives,
    theme: {
        defaultTheme: "defaultTheme",
        themes: {
            defaultTheme,
            darkTheme
        },
    },
});

export default vuetify;