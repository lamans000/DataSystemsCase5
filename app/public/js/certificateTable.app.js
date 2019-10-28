var certificateTableApp = new Vue({
  el: '#certificateTableApp',
  data: {
    certificates: []
  },
  methods: {
    fetchCertificates() {
      fetch('api/certificates/')
      .then(response => response.json())
      .then(json => { certificateTableApp.certificates = json })
    },
    handleRowClick(certificate) {
      updateCertificateApp.certificate = certificate;
    }
  },
  created() {
    this.fetchCertificates();
  }
})
