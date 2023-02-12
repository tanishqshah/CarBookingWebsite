function changeimage(source, num, colors, id) {
  document.getElementById("big-img").src = source;
  document.getElementById("num").innerText = num;

  let link = document.getElementById("senddata").href;
  // console.log(link);
  let data = link.replace(link.split("?")[1], `cdid=${id}`);
  console.log(data);
  document.getElementById("senddata").href = data;
  // console.log(id);
}

function calcprice(price, discount) {
  console.log(price, discount);
  let start_date = document.getElementById("start_date").value;
  let end_date = document.getElementById("end_date").value;
  if (start_date !== "") {
    let days =
      (new Date(end_date) - new Date(start_date)) / eval(24 * 60 * 60 * 1000);
    if (days >= 0) {
      if (days === 0) {
        days = 1;
      }
      price = parseInt(price);
      discount = parseInt(discount);
      let f = price * days;
      let disAmount = (discount / 100) * f;
      f = f - disAmount;
      console.log(f);
      document.getElementById("final_amount").innerText = f;
      console.log(document.getElementById("final_amount").innerText);
    } else {
      alert("End Date should be greater than start date");
    }
  } else {
    alert("Please select a start date");
  }
}
