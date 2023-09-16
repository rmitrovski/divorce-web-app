import '@testing-library/jest-dom';



describe('DOM manipulation', ()=>{


 beforeEach(()=>{
    // Mocking the DOM elements
 document.body.innerHTML = `
 <section id="sidebar">
         <a href="#" class="brand">
             <span class="text">Clean Divorce</span>
         </a>
         <ul class="side-menu top">
             <li <?php if ($current_page == 'index.php') echo 'class="active"'; ?>>
                 <a a href="index.php">
                     <i class='bx bxs-dashboard' ></i>
                     <span class="text">Dashboard</span>
                 </a>
             </li>
         
             <li>
                 <a href="chatbotgpt.php">
                     <i class='bx bxl-android' ></i>
                     <span class="text">Chatbot</span>
                 </a>
             </li>
             <li <?php if ($current_page == 'week_system.php') echo 'class="active"'; ?>>
                 <a href="week_system.php">
                     <i class='bx bxs-donate-blood' ></i>
                     <span class="text">8 Week system </span>
                 </a>
             </li>
             <li >
                 <a href="#">
                     <i class='bx bxs-face' ></i>
                     <span class="text">Profile</span>
                 </a>
             </li>
             <li <?php if ($current_page == 'FAQ.php') echo 'class="active"'; ?>>
                 <a href="FAQ.php">
                     <i class='bx bxs-conversation' ></i>
                     <span class="text">FAQ</span>
                 </a>
             </li>
             <li <?php if ($current_page == 'booking.php') echo 'class="active"'; ?>>
                 <a href="booking.php">
                     <i class='bx bxs-group' ></i>
                     <span class="text">Book Consultation</span>
                 </a>
             </li>
         </ul>
         <ul class="side-menu">
             <li <?php if ($current_page == 'settings.php') echo 'class="active"'; ?>>
                 <a href="settings.php">
                     <i class='bx bxs-cog' ></i>
                     <span class="text">Settings</span>
                 </a>
             </li>
             <li>
                 <a href="index.php?logout='1'" class="logout">
                     <i class='bx bxs-log-out-circle' ></i>
                     <span class="text">Logout</span>
                 </a>
             </li>
         </ul>
     </section>
 `});   


   test('activate a side menu when clicked ',()=>{
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
    const firstItem = allSideMenu[0];
    firstItem.click();
    expect(firstItem.parentElement).toHaveClass('active');

   });


   test('toggle sidebar when menue bar is clicked  ',()=>{
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');
    menuBar.click();
    expect(sidebar).toHaveClass('hide');

   });





















});
    
  


