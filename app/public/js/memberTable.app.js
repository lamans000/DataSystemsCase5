var memberTableApp = new Vue({
  el: '#memberTableApp',
  data: {
    members: [],
    filter: {
      stationNumber: '',
      radioNumber: ''
    }
  },
  methods: {
    fetchMembers() {
      fetch('api/records/')
      .then(response => response.json())
      .then(json => { memberTableApp.members = json })
    },
    handleRowClick(member) {
      updateMemberApp.member = member;
    }
  },
  created() {
    this.fetchMembers();
  }
})
