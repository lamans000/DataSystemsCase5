var memberCertificationsTable = new Vue({
  el: '#memberCertificationsTable',
  data: {
    memberCertificates: [],
    filter: {
      certificationName: ''
    }
  },
  methods: {
    fetchMembers() {
      fetch('api/memberCertificates/')
      .then(response => response.json())
      .then(json => { memberCertificationsTable.memberCertificates = json })
    }
  },
  created() {
    this.fetchMembers();
  }
})
