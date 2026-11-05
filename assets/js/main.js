function loadProperties() {
  document.getElementById('list').innerHTML = '<p>Loading...</p>';
  let city = document.getElementById('city').value;
  let gender = document.getElementById('gender').value;
  let budget = document.getElementById('budget').value;

  fetch(`api/filter.php?city=${city}&gender=${gender}&budget=${budget}`)
    .then(r => r.json())
    .then(data => {
      if (data.length == 0) {
        document.getElementById('list').innerHTML = '<p>No PG found</p>';
        return;
      }
      document.getElementById('list').innerHTML = data.map(p => `
        <div class="col-md-4 mb-3">
          <div class="card p-3">
            <h5>${p.name}</h5>
            <p>${p.city} | ${p.gender} | Rs.${p.price}/mo | ⭐ ${p.rating}</p>
            <p>${p.description}</p>
            <a href="property.php?id=${p.id}" class="btn btn-primary btn-sm">View Details</a>
            <button onclick="markInterest(${p.id}, this)" class="btn btn-danger btn-sm mt-2">♥ Interested</button>
          </div>
        </div>`).join('');
    });
}

function markInterest(id, btn) {
  fetch('api/interest.php', {
    method: 'POST',
    body: new URLSearchParams({ property_id: id })
  })
  .then(r => r.json())
  .then(d => {
    btn.innerText = d.status;
    alert(d.message);
  });
}

loadProperties();