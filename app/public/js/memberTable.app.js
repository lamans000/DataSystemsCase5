var memberTableApp = new Vue({
  el: '#memberTableApp',
  data: {
    members: []
  },
  methods: {
    fetchMembers() {
      fetch('api/records/')
      .then(response => response.json())
      .then(json => { memberTableApp.members = json })
    }
  },
  created() {
    this.fetchMembers();
  }
})
