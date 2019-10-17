var memberRecordsApp = new Vue({
  el: '#memberRecordsApp',
  data: {
    members: [],
    recordMember: {},
    filter: {
      sab: ''
    }
  },
  methods: {
    fetchMembers() {
      fetch('api/records/')
      .then(response => response.json())
      .then(json => { memberRecordsApp.members = json })
    },
    handleSubmit(event) {
      fetch('api/records/post.php', {
        method:'POST',
        body: JSON.stringify(this.recordMember),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      .then( response => response.json() )
      .then( json => { memberRecordsApp.members.push(json[0]) })
      .catch( err => {
        console.error('RECORD POST ERROR:');
        console.error(err);
      })
      this.handleReset();
    },
    handleReset() {
      this.recordMember = {
        firstName: '',
        lastName: '',
        dob: '',
        gender: '',
        startDate: '',
        street: '',
        city: '',
        state: '',
        zip: '',
        email: '',
        workPhoneNumber: '',
        mobilePhoneNumber: '',
        jobTitle: '',
        radioNumber: '',
        stationNumber: '',
        isActive: ''
      }
    },
    // handleRowClick(patient) {
    //   patientTriageApp.patient = patient;
    // }
  }, // end methods
  created() {
    this.handleReset();
    this.handleSubmit();
    this.fetchMembers();
  }
});
