$(function () {
    let ProvinceAPI = 'https://provinces.open-api.vn/api/?depth=3';

    $.ajax({
        url: ProvinceAPI,
        type: 'GET',
        dataType: 'JSON',
        success: function (response) {

            response.forEach(province => {

                $('#province').append(`<option value="${province.code}">${province.name}</option>`);
            });


            $('#province').change(function () {

                if ($(this).val() != '') {
                    //remove district, ward when choose another province
                    $('#district option[value]').remove();
                    $('#ward option[value]').remove();

                    //CanTho = 92
                    let provinceCode = $(this).find(":selected").val();

                    //provinceInfo return array of object, in object having key "districts" => [{...},{...}].
                    let provinceInfo = response.filter(item => {
                        return item.code == provinceCode;
                    })

                    //districts is array, an element is district object with district_name, wards
                    let [{ districts }] = [...provinceInfo];
                    localStorage.setItem("districts", JSON.stringify(districts));

                    districts.forEach(district => {
                        $('#district').append(`<option value="${district.code}">${district.name}</option>`);
                    })

                }
            })

            $('#district').change(function () {

                $('#ward option[value]').remove();

                //NinhKieu = 916
                let districtCode = $(this).find(":selected").val();

                let districts = JSON.parse(localStorage.getItem("districts"));
                //get wards info from disctrict_code
                let wardsInfo = districts.filter(item => {
                    return item.code == districtCode;
                })

                //wards is array, an element is wards object with ward_name, ward_code
                let [{ wards }] = [...wardsInfo];

                wards.forEach(ward => {
                    $('#ward').append(`<option value="${ward.code}">${ward.name}</option>`);
                })
            })

        },
        error: function () {
            throw new Error('Having errors! Please check your API!');
        }
    })
});

