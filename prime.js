for (var i = 2; i <= 100; i++) {
  let n = parseInt(i/2);
  for (var j = 2; j <= n ; j++) {
    if(i%j==0)
      break;
    if (j==n) {
      console.log(i)
    }
  }
}