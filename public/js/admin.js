jQuery(document).ready(function(){
    var originElems = $('#customers-table tbody tr');
    var elems = originElems.clone();

    $('#search-email').change(function(){
        var searchEmailValue = $('#search-email').val();
        var foundElems = [];

        elems.each(function(index, element){
            if(element.querySelector('.email').innerText.includes(searchEmailValue)) {
                foundElems.push(element);
            }
        });

        $('#customers-table tbody tr').remove();
        $('#customers-table tbody').append(foundElems);
    });

    $('#search-ip').change(function(){
        var searchIpValue = $('#search-ip').val();
        var foundElems = [];

        elems.each(function(index, element){
            if(element.querySelector('.ip').innerText.includes(searchIpValue)) {
                foundElems.push(element);
            }
        });

        $('#customers-table tbody tr').remove();
        $('#customers-table tbody').append(foundElems);
    });

    $('#search-personal-code').change(function(){
        var searchAccValue = $('#search-personal-code').val();
        var foundElems = [];

        elems.each(function(index, element){
            if(element.querySelector('.personal-code').innerText.includes(searchAccValue)) {
                foundElems.push(element);
            }
        });

        $('#customers-table tbody tr').remove();
        $('#customers-table tbody').append(foundElems);
    });
});


// blanks
const blankSelect = document.querySelector('#blank');

if (blankSelect) {
    blankSelect.addEventListener('change', (event) => {
        let blankId = event.target.value;

        fetch('/admin/get-blank/' + blankId)
            .then(response => response.json())
            .then(data => {
                document.querySelector('#title').value = data.title;
                document.querySelector('#text').value = data.text;
            });
    });
}

