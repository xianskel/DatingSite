  var count = 0;

  function addAnswer(answer) {
      document.getElementById(count).value = answer;
      nextQuestion();
      if (count > 10) {
          document.getElementById("test").submit();
      }
  }

  function nextQuestion() {

      var current = count.toString();
      var x = count + 1;
      var next = x.toString();
      document.getElementById("q" + next).style.display = "inline";
      document.getElementById("q" + current).style.display = "none";

      count++;
  }