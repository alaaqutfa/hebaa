const { createApp, watchEffect } = Vue;

const app = createApp({
  data() {
    return {
      dark: false,
      showPassword: false
    }
  },
  mounted() {
    this.initPhoneFields();

    this.dark = this.getThemeFromLocalStorage();

    watchEffect(() => {
      document.documentElement.classList.toggle('dark', this.dark);
    });
  },
  methods: {
    // Theme Handling
    getThemeFromLocalStorage() {
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'));
      }
      return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
      );
    },
    setThemeToLocalStorage(value) {
      window.localStorage.setItem('dark', value);
    },
    toggleTheme() {
      this.dark = !this.dark;
      this.setThemeToLocalStorage(this.dark);
    },
    togglePassword() {
      this.showPassword = !this.showPassword;
    },
    initPhoneFields() {
      const inputs = document.querySelectorAll(".phoneField");
      if (inputs) {
        inputs.forEach(input => {
          window.intlTelInput(input, {
            initialCountry: "iq", // سوريا مثلاً
            nationalMode: false,
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
          });
        });
      }
    }
  }
});

app.config.compilerOptions.delimiters = ['[[', ']]'];

app.mount('#app');
