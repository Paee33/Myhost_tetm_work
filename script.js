$(document).ready(function () {
    // ฟังก์ชันนี้จะทำงานเมื่อเกิดการเปลี่ยนแปลงในอิลิเมนต์ select แรก
    $('select[name="gender"]').change(function () {
        // ตรวจสอบว่าค่าที่ถูกเลือกเป็น "หญิง" หรือไม่
        if ($(this).val() === "หญิง") {
            // ปิดใช้งานอิลิเมนต์ select ที่สอง
            $('select[name="soldier"]').prop('disabled', true);
        } else {
            // เปิดใช้งานอิลิเมนต์ select ที่สอง
            $('select[name="soldier"]').prop('disabled', false);
        }
    });
});

function previewImage(event) {
    var input = event.target;
    var photoPreview = document.getElementById("photo_preview");

    if (input.files && input.files[0]) {
        var fileSize = input.files[0].size; // ขนาดของไฟล์ (bytes)

        // ตรวจสอบว่าขนาดของไฟล์ไม่เกิน 5MB
        if (fileSize <= 5 * 1024 * 1024) {
            var reader = new FileReader();

            reader.onload = function (e) {
                photoPreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            // ล้างข้อมูลอินพุทและแสดงข้อความผิดพลาด
            input.value = null;
            alert("ไฟล์ภาพต้องไม่เกิน 5MB");
            photoPreview.src = "img/44.png"; // แทนที่ด้วยที่อยู่รูปภาพเริ่มต้น
        }
    } else {
        // ล้างการแสดงตัวอย่างหากไม่มีไฟล์ที่ถูกเลือก
        photoPreview.src = "img/44.png"; // แทนที่ด้วยที่อยู่รูปภาพเริ่มต้น
    }
}

    function validateForm() {
        var imageInput = document.getElementById('profileImage');
        var imageValue = imageInput.value;
        
        if (!imageValue) {
            Swal.fire({
                icon: "warning",
                title: "กรุณาเลือกรูปภาพ",
                text: "โปรดเลือกรูปภาพก่อนที่จะบันทึก"
            });
            return false;
        }
        
        return true;
    }
    function validateID(input) {
        // Remove any non-numeric characters from the input
        let numericValue = input.value.replace(/\D/g, '');
  
        // Format the numeric value as per the desired pattern
        let formattedValue = numericValue.replace(/(\d{1})(\d{4})(\d{5})(\d{2})(\d{1})/, '$1-$2-$3-$4-$5');
  
        // Update the input value with the formatted value
        input.value = formattedValue;
      }

      
      function validateExpiryDate(input) {
        // Remove any non-numeric characters from the input
        let numericValue = input.value.replace(/\D/g, '');
  
        // Format the numeric value as MM-YYYY
        let formattedValue = numericValue.replace(/(\d{2})(\d{4})/, '$1-$2');
  
        // Update the input value with the formatted value
        input.value = formattedValue;
      }     

      function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var img = document.getElementById('photo_preview');
            img.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }

    
    function validateForm() {
        var inputFile = document.getElementById('profileImage');
        var errorMessage = document.getElementById('error-message');

        // Check if a file is selected
        if (inputFile.files.length === 0) {
            errorMessage.innerHTML = 'กรุณาเลือกรูปภาพ';
            return false;
        }

        // Check if the file is a PNG
        var fileName = inputFile.files[0].name;
        if (!fileName.toLowerCase().endsWith('.png')) {
            errorMessage.innerHTML = 'กรุณาเลือกไฟล์รูปภาพที่มีนามสกุล .png เท่านั้น';
            return false;
        }

        // Check if the file size is within the limit (in bytes)
        var maxSizeInBytes = 1024 * 1024; // 1 MB
        if (inputFile.files[0].size > maxSizeInBytes) {
            errorMessage.innerHTML = 'ขนาดไฟล์รูปภาพต้องไม่เกิน 1 MB';
            return false;
        }

        // Clear any previous error messages
        errorMessage.innerHTML = '';
        return true;
    }

    function autofillAddress() {
        // Get values from card address fields
        var houseCard = document.getElementsByName("house_card")[0].value;
        var swineCard = document.getElementsByName("swine_card")[0].value;
        var alleyCard = document.getElementsByName("alley_card")[0].value;
        var roadCard = document.getElementsByName("road_card")[0].value;
        var districtCard = document.getElementsByName("district_card")[0].value;
        var prefectureCard = document.getElementsByName("prefecture_card")[0].value;
        var provinceCard = document.getElementsByName("province_card")[0].value;
        var codeCard = document.getElementsByName("code_card")[0].value;

        // Check if the checkbox is checked
        var checkbox = document.getElementsByName("autofill_checkbox")[0];
        if (checkbox.checked) {
            // Fill current address fields with card address values
            document.getElementsByName("house")[0].value = houseCard;
            document.getElementsByName("swine")[0].value = swineCard;
            document.getElementsByName("alley")[0].value = alleyCard;
            document.getElementsByName("road")[0].value = roadCard;
            document.getElementsByName("district")[0].value = districtCard;
            document.getElementsByName("prefecture")[0].value = prefectureCard;
            document.getElementsByName("province")[0].value = provinceCard;
            document.getElementsByName("code")[0].value = codeCard;
        } else {
            // If unchecked, set current address fields to empty
            document.getElementsByName("house")[0].value = "";
            document.getElementsByName("swine")[0].value = "";
            document.getElementsByName("alley")[0].value = "";
            document.getElementsByName("road")[0].value = "";
            document.getElementsByName("district")[0].value = "";
            document.getElementsByName("prefecture")[0].value = "";
            document.getElementsByName("province")[0].value = "";
            document.getElementsByName("code")[0].value = "";
        }
    }

    function toggleFields() {
        var selectElement = document.getElementById("working");
        var companyField = document.getElementById("company");
        var rankField = document.getElementById("rank");
        var startWorkField = document.getElementById("start_work");
        var endWorkField = document.getElementById("end_work");
        var webField = document.getElementById("web");
        var detailField = document.getElementById("detail");
        var reasonField = document.getElementById("reason");

        if (selectElement.value === "มี") {
            companyField.disabled = false;
            rankField.disabled = false;
            startWorkField.disabled = false;
            endWorkField.disabled = false;
            webField.disabled = false;
            detailField.disabled = false;
            reasonField.disabled = false;
        } else {
            companyField.disabled = true;
            rankField.disabled = true;
            startWorkField.disabled = true;
            endWorkField.disabled = true;
            webField.disabled = true;
            detailField.disabled = true;
            reasonField.disabled = true;
        }
    }


    function toggleInputs() {
        var selectBox = document.getElementById("working");
        var companyInput2 = document.getElementById("company2");
        var rankInput2 = document.getElementById("rank2");
        var startInput2 = document.getElementById("start_work2");
        var endInput2 = document.getElementById("end_work2");
        var webInput2 = document.getElementById("web2");
        var detailInput2 = document.getElementById("detail2");
        var reasonInput2 = document.getElementById("reason2");
        var companyInput3 = document.getElementById("company3");
        var rankInput3 = document.getElementById("rank3");
        var startInput3 = document.getElementById("start_work3");
        var endInput3 = document.getElementById("end_work3");
        var webInput3 = document.getElementById("web3");
        var detailInput3 = document.getElementById("detail3");
        var reasonInput3 = document.getElementById("reason3");

        if (selectBox.value === "นักศึกษาฝึกงาน") {
            companyInput2.setAttribute("required", "");
            rankInput2.setAttribute("required", "");
            startInput2.setAttribute("required", "");
            endInput2.setAttribute("required", "");
            webInput2.setAttribute("required", "");
            detailInput2.setAttribute("required", "");
            reasonInput2.setAttribute("required", "");
            companyInput3.setAttribute("required", "");
            rankInput3.setAttribute("required", "");
            startInput3.setAttribute("required", "");
            endInput3.setAttribute("required", "");
            webInput3.setAttribute("required", "");
            detailInput3.setAttribute("required", "");
            reasonInput3.setAttribute("required", "");
        } else {
            companyInput2.removeAttribute("required");
            rankInput2.removeAttribute("required");
            startInput2.removeAttribute("required");
            endInput2.removeAttribute("required");
            webInput2.removeAttribute("required");
            detailInput2.removeAttribute("required");
            reasonInput2.removeAttribute("required");
            companyInput3.removeAttribute("required");
            rankInput3.removeAttribute("required");
            startInput3.removeAttribute("required");
            endInput3.removeAttribute("required");
            webInput3.removeAttribute("required");
            detailInput3.removeAttribute("required");
            reasonInput3.removeAttribute("required");
        }
    }
