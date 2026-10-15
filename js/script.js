// Small site script: sets the year and gallery filters
document.addEventListener('DOMContentLoaded', function(){
  var y = document.querySelector('[data-year]'); if (y) y.textContent = new Date().getFullYear();
  // Gallery filter
  var filters = document.querySelectorAll('.filters button');
  var figures = document.querySelectorAll('.gallery figure');
  filters.forEach(function(btn){ btn.addEventListener('click', function(){
    filters.forEach(function(b){b.classList.remove('active')}); btn.classList.add('active');
    var filter = btn.getAttribute('data-filter');
    figures.forEach(function(f){
      if (filter==='All' || f.getAttribute('data-category')===filter) { f.style.display='block'; }
      else { f.style.display='none'; }
    });
  }); });
});
