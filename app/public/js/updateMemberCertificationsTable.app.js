var updateMemberCertificationsTableApp = new Vue({
  el: '#updateMemberCertificationsTableApp',
  data: {
    members: [],
    certificates: {},
    memberCertificate: {}
  },
  methods: {
    fetchMembers() {
      fetch('api/records/')
      .then(response => response.json())
      .then(json => { updateMemberCertificationsTableApp.members = json })
    },
    fetchCertificates() {
      fetch('api/certificates/')
      .then(response => response.json())
      .then(json => { updateMemberCertificationsTableApp.certificates = json })
    },
    handleSubmit() {
      fetch('api/memberCertificates/post.php',
      {
        method:'POST',
        body: JSON.stringify(this.memberCertificate),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleDelete() {
      fetch('api/memberCertificates/delete.php',
      {
        method:'POST',
        body: JSON.stringify(this.memberCertificate),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleReset() {
      this.memberCertificate = {
      memberCertification: '',
      memberID: '',
      certificationID: '',
      certificationReceived:''
      }
    }
  },
  created() {
    this.fetchCertificates();
    this.fetchMembers();
  }
})
