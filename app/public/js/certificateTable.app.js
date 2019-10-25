var certificateTableApp = new Vue({
  el: '#certificateTableApp',
  data: {
    certificates: []
  },
  methods: {
    fetchMembers() {
      fetch('api/certificates/')
      .then(response => response.json())
      .then(json => { certificateTableApp.certificates = json })
    }
    // handleRowClick(member) {
    //   updateMemberApp.member = member;
    // }
  },
  created() {
    this.fetchMembers();
  }
})
