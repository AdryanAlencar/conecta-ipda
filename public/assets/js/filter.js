var selectState = document.getElementById('state');
var selectCity = document.getElementById('city');
var selectDistrict = document.getElementById('district');

selectState.addEventListener('change', async function () {
    var state = selectState.options[selectState.selectedIndex].value;
    var json = await (await fetch(`/api/states/${state}/cities`)).json();
    var cities = json;
    selectCity.innerHTML = '';
    for (var i = 0; i < cities.length; i++) {
        var option = document.createElement('option');
        option.value = cities[i].id;
        option.innerHTML = cities[i].name;
        selectCity.appendChild(option);
    }
    selectCity.disabled = false;
});

selectCity.addEventListener('change', async function () {
    var city = selectCity.options[selectCity.selectedIndex].value;
    fetch(`/api/cities/${city}/districts`).then(function (response) {
        if (response.text().length > 0) {
            var json = response.json();
            json.then(function (data) {
                selectDistrict.innerHTML = '';
                for (var i = 0; i < districts.length; i++) {
                    var option = document.createElement('option');
                    option.value = districts[i].id;
                    option.innerHTML = districts[i].name;
                    selectDistrict.appendChild(option);
                }
                selectDistrict.disabled = false;
            })
        }
    })

});


