var updateMemberApp = new Vue({
  el: '#updateMemberApp',
  data: {
    member: {}
  },
  methods: {
    handleUpdate() {
      fetch('api/records/update.php',
      {
        method:'POST',
        body: JSON.stringify(this.member), //convert this into a string of bytes so you can send it across the network.
        headers: {
          "Content-Type": "application/json; charset=utf-8" //UTF-8 is a character encoding standard for representing letters and numbers
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleSubmit() {
      fetch('api/records/post.php',
      {
        method:'POST',
        body: JSON.stringify(this.member), //convert this into a string of bytes so you can send it across the network.
        headers: {
          "Content-Type": "application/json; charset=utf-8" //UTF-8 is a character encoding standard for representing letters and numbers
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleDelete() {
      fetch('api/records/delete.php',
      {
        method:'POST',
        body: JSON.stringify(this.member),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      this.handleReset();
      location.reload(true);
    },
    handleReset() {
      this.member = {
      memberID: '',
      firstName: '',
      lastName: '',
      gender: '',
      dob: '',
      address:'',
      email:'',
      startDate: '',
      radioNumber:'',
      stationNumber:''
      }
    }
  },
  created() {
  this.handleReset();
}
});
