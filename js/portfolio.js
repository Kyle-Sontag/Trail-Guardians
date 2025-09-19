document.addEventListener('DOMContentLoaded', function(){
  const photos = [
    'images/portrait/placeholder1.png',
    'images/portrait/placeholder2.png',
    'images/portrait/placeholder3.png',
    'images/portrait/placeholder4.png'
  ];

  let currentIndex = 0;
  const profileImg = document.querySelector('.profile-photo');

  function changePhoto() {
    profileImg.style.opactity = '0';

    setTimeout(() => {
      profileImg.src = photos[currentIndex];
      profileImg.style.opactity = '1';
      currentIndex = (currentIndex + 1) % photos.length;
    },  250);
  }

  changePhoto();
  setInterval(changePhoto, 10000)
});