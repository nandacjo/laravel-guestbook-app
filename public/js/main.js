
// buka tutuup password
const buka = document.querySelector('.buka')
const tutup = document.querySelector('.tutup')
const password = document.getElementById("password");
const toggle = document.getElementById("icon");
function iconn() {
  if (password.type === "password") {
    password.setAttribute("type", "text");
    tutup.style.opacity='0';
    buka.style.opacity='1';


  } else {
    password.setAttribute("type", "password");
    tutup.style.opacity='1';
    buka.style.opacity='0';

  }
}



// tombol logout
const iconUser = document.querySelector('.iconUser')
const logout = document.querySelector('.keluar')

function muncul(){
  if(logout.style.opacity ==='0'){
    logout.style.opacity="1";
  }else{
    logout.style.opacity="0";
  }
}

// tambah daftar tamu baru

const halUtama = document.getElementById('halUtama')
const container = document.querySelector('.container')
const cancel = document.querySelector('.cancel')
const tambah = document.querySelector('.tambah')
const edit = document.querySelector('.edit')
const btn = document.querySelector('.btn')

tambah.addEventListener('click',()=>{
  halUtama.style.opacity="0.5";
  container.style.display="grid";
})


cancel.addEventListener('click',()=>{
  container.style.display="none";
  halUtama.style.opacity="1";
})


// btn.addEventListener('click',()=>{
//   halUtama.style.opacity="1";
//   container.style.display="none";

//     Swal.fire({
//     position: 'center',
//     icon: 'success',
//     title: 'data telah di tambahkan',
//     showConfirmButton: false,
//     timer: 1500
//   })
// })





