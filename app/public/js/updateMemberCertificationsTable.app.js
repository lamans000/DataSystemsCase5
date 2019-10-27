var updateMemberCertificationsTableApp = new Vue({
  el: '#updateMemberCertificationsTableApp',
  data: {
    members: [],
    certificates: {},
    memberCertificates: {}
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
        body: JSON.stringify(this.memberCertificates),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
    }
  },
  created() {
    this.fetchCertificates();
    this.fetchMembers();
  }
})
