var updateCertificateApp = new Vue({
  el: '#updateCertificateApp',
  data: {
    certificate: {}
  },
  methods: {
    handleUpdate() {
      fetch('api/certificates/update.php',
      {
        method:'POST',
        body: JSON.stringify(this.certificate),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleSubmit() {
      fetch('api/certificates/post.php',
      {
        method:'POST',
        body: JSON.stringify(this.certificate),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleDelete() {
      fetch('api/certificates/delete.php',
      {
        method:'POST',
        body: JSON.stringify(this.certificate),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleReset() {
      this.certificate = {
      certificationID: '',
      certificationName: '',
      certifyingAgency: '',
      expirationPeriod:''
      }
    }
  },
  created() {
    this.handleReset();
  }
});
