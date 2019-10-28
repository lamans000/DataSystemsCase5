var expiredCertificationsApp = new Vue({
  el: '#expiredCertificationsApp',
  data: {
    expiredCertifications: []
  },
  methods: {
    fetchCertificates() {
      fetch('api/expiredCertifications/')
      .then(response => response.json())
      .then(json => { expiredCertificationsApp.expiredCertifications = json })
    },
    handleRowClick(expiredCertification) {
      updateExpiredCertificationsApp.expiredCertification = expiredCertification;
    }
  },
  created() {
    this.fetchCertificates();
  }
})
