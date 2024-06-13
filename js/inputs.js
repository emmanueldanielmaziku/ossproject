function validateInputOne(inputID1) {
  inputID1.addEventListener("input1", function () {
    if (this.value.length > 3) {
      this.value = this.value.slice(0, 3);
    } else {
         console.log(this.value);
    }
  });
 
}

function validateInputTwo(inputID2) {
  inputID2.addEventListener("input2", function () {
    if (this.value.length > 3) {
      this.value = this.value.slice(0, 3);
    } else {
      console.log(this.value);
    }
  });
}

function validateInputThree(inputID3) {
  inputID3.addEventListener("input3", function () {
    if (this.value.length > 3) {
      this.value = this.value.slice(0, 3);
    } else {
      console.log(this.value);
    }
  });
}

function validateInputFour(inputID4) {
  inputID4.addEventListener("input4", function () {
    if (this.value.length > 3) {
      this.value = this.value.slice(0, 3);
    } else {
      console.log(this.value);
    }
  });
}

function validateInputFive(inputID5) {
  inputID5.addEventListener("input5", function () {
    if (this.value.length > 3) {
      this.value = this.value.slice(0, 3);
    } else {
      console.log(this.value);
    }
  });
}


validateInputOne(document.getElementById("intOne"));
validateInputTwo(document.getElementById("intTwo"));
validateInputThree(document.getElementById("intThree"));
validateInputFour(document.getElementById("intFour"));
validateInputFive(document.getElementById("intFive"));

