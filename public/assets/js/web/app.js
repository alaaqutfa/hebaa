const { createApp, watchEffect, nextTick, ref } = Vue;

const app = createApp({
  data() {
    return {
      // dark: false,
      isSideMenuOpen: false,
      isNotificationsMenuOpen: false,
      isProfileMenuOpen: false,
      isPagesMenuOpen: false,
      trapCleanup: null,
      basicImagePreview: null,
      multipleImagePreviews: [],
    };
  },
  mounted() {
    // this.dark = this.getThemeFromLocalStorage();

    // watchEffect(() => {
    //   document.documentElement.classList.toggle('dark', this.dark);
    // });
  },
  methods: {

    changeProjectImage(src) {
      document.getElementById('project-basic-image').src = src;
    },

    // ✅ رفع صورة أساسية مع التحقق
    handleBasicImage(event) {
      const file = event.target.files[0];
      const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];

      if (file) {
        if (!allowedTypes.includes(file.type)) {
          alert(`الملف "${file.name}" ليس من نوع صورة مدعوم.`);
          this.basicImagePreview = null;
          event.target.value = "";
          return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
          this.basicImagePreview = e.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        this.basicImagePreview = null;
        event.target.value = "";
      }
    },

    // ✅ رفع صور متعددة مع التحقق
    handleMultipleImages(event) {
      this.multipleImagePreviews = [];
      const files = Array.from(event.target.files);
      const allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];

      for (const file of files) {
        if (!allowedTypes.includes(file.type)) {
          alert(`الملف "${file.name}" ليس من نوع صورة مدعوم.`);
          event.target.value = "";
          return;
        }
      }

      files.forEach((file) => {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.multipleImagePreviews.push(e.target.result);
        };
        reader.readAsDataURL(file);
      });
    },

    // ✅ فتح input بالـ id
    triggerFile(id) {
      document.getElementById(id)?.click();
    },

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

    // Side Menu
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },

    // Notifications Menu
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },

    // Profile Menu
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },

    // Pages Menu
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },

    // Modal
    openModal(id) {
      nextTick(() => {
        const modal = document.querySelector('#' + id);
        modal.classList.add('show');
        if (typeof focusTrap !== 'undefined' && modal) {
          this.trapCleanup = focusTrap(modal);
        }
      });
    },
    closeModal(id) {
      const modal = document.querySelector('#' + id);
      modal.classList.remove('show');
      if (this.trapCleanup) {
        this.trapCleanup();
      }
    }
  }
});

app.mount('#app');
