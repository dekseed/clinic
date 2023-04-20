jQuery(".form-CreateUser").validate({
    rules: {
        "val_title_name": {
            required: !0
        },
        "val_jobs_title": {
            required: !0
        },
        "val_first_name": {
            required: !0
        },
        "val_last_name": {
            required: !0
        },
        "val_email": {
            required: !0,
            email: !0
        },
        "val_title_name": {
            required: !0
        },
        "val_tel": {
            required: !0,
            number: !0
        },
        "val_password": {
            required: !0,
            minlength: 5
        },
        "val_confirm_password": {
            required: !0,
            equalTo: "#val_password"
        }

    },
    messages: {
        "val_title_name": "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        "val_jobs_title": "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        "val_first_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "val_last_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "val-email": "กรุณาใส่อีเมล์ที่ถูกต้อง",
        "val_title_name": {
            required: "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        },
        "val_tel": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "val_password": {
            required: "กรุณากรอกรหัสผ่านให้เรียบร้อย!",
            minlength: "รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป"
        },
        "val_confirm_password": {
            required: "กรุณากรอกยืนยันรหัสผ่านให้เรียบร้อย!",
            minlength: "รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป",
            equalTo: "รหัสผ่านไม่ตรงกัน!"
        }

    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


jQuery(".form-login").validate({
    rules: {
        "val_email": {
            required: !0,
            email: !0
        },
        "val_password": {
            required: !0,
            minlength: 6
        }
    },
    messages: {

        "val_email": "กรุณาใส่อีเมล์ที่ถูกต้อง",
        "val_password": {
            required: "กรุณากรอกรหัสผ่านให้เรียบร้อย!",
            minlength: "รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป"
        }
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


jQuery(".form-editUser").validate({
    rules: {
        "val_first_name": {
            required: !0
        },
        "val_last_name": {
            required: !0
        },
        "val_email": {
            required: !0,
            email: !0
        },
        "val_title_name": {
            required: !0
        },
        "val_tel": {
            required: !0,
            number: !0
        }

    },
    messages: {
        "val_first_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "val_last_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "val-email": "กรุณาใส่อีเมล์ที่ถูกต้อง",
        "val_title_name": {
            required: "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        },
        "val_tel": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        }
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});

jQuery(".form-editPassword").validate({
    rules: {

        "val_password": {
            required: !0,
            minlength: 5
        },
        "val_confirm_password": {
            required: !0,
            equalTo: "#val_password"
        }

    },
    messages: {

        "val_password": {
            required: "กรุณากรอกรหัสผ่านให้เรียบร้อย!",
            minlength: "รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป"
        },
        "val_confirm_password": {
            required: "กรุณากรอกยืนยันรหัสผ่านให้เรียบร้อย!",
            minlength: "รหัสผ่านต้องมีตัวอักษรภาษาอังกฤษหรือตัวเลขมากกว่า 6 ตัวขึ้นไป",
            equalTo: "รหัสผ่านไม่ตรงกัน!"
        }

    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});

jQuery(".form-valide").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3
        },
        "val-email": {
            required: !0,
            email: !0
        },
        "val-password": {
            required: !0,
            minlength: 5
        },
        "val-confirm-password": {
            required: !0,
            equalTo: "#val-password"
        },
        "val-select2": {
            required: !0
        },
        "val-select2-multiple": {
            required: !0,
            minlength: 2
        },
        "val-suggestions": {
            required: !0,
            minlength: 5
        },
        "val-skill": {
            required: !0
        },
        "val-currency": {
            required: !0,
            currency: ["$", !0]
        },
        "val-website": {
            required: !0,
            url: !0
        },
        "val-phoneus": {
            required: !0,
            phoneUS: !0
        },
        "val-digits": {
            required: !0,
            digits: !0
        },
        "val-number": {
            required: !0,
            number: !0
        },
        "val-range": {
            required: !0,
            range: [1, 5]
        },
        "val-terms": {
            required: !0
        }
    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "val-email": "Please enter a valid email address",
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        "val-confirm-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        "val-select2": "Please select a value!",
        "val-select2-multiple": "Please select at least 2 values!",
        "val-suggestions": "What can we do to become better?",
        "val-skill": "Please select a skill!",
        "val-currency": "Please enter a price!",
        "val-website": "Please enter your website!",
        "val-phoneus": "Please enter a US phone!",
        "val-digits": "Please enter only digits!",
        "val-number": "Please enter a number!",
        "val-range": "Please enter a number between 1 and 5!",
        "val-terms": "You must agree to the service terms!"
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});


jQuery(".form-valide-with-icon").validate({
    rules: {
        "val-username": {
            required: !0,
            minlength: 3
        },
        "val-password": {
            required: !0,
            minlength: 5
        }
    },
    messages: {
        "val-username": {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 3 characters"
        },
        "val-password": {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        }
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
    }




});

jQuery(".step-form-horizontal").validate({
    rules: {
        "title_name": {
            required: !0
        },
        "first_name": {
            required: !0
        },
        "last_name": {
            required: !0
        },
        "birthday": {
            required: !0
        },
        "email": {
            required: !0,
            email: !0
        },
        "phonenumber": {
            required: !0,
            number: !0
        },
        "cid": {
            required: !0,
            number: !0
        },
        "sex": {
            required: !0
        },
        "status_patient_id": {
            required: !0
        },
        "first_name_father": {
            required: !0
        },
        "last_name_father": {
            required: !0
        },
        "first_name_mother": {
            required: !0
        },
        "last_name_mother": {
            required: !0
        },
        "first_name_relation": {
            required: !0
        },
        "last_name_relation": {
            required: !0
        },
        "relation_tel": {
            required: !0
        },
        "relationship": {
            required: !0
        },
        "home_id": {
            required: !0
        },

        "district": {
            required: !0
        },
        "amphoe": {
            required: !0
        },
        "province": {
            required: !0
        },
        "zip_code": {
            required: !0
        },
    },
    messages: {
        "title_name": "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        "first_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "last_name": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
        },
        "email": "กรุณาใส่อีเมล์ที่ถูกต้อง",
        "birthday": {
            required: "กรุณาเลือกข้อมูลให้ครบถ้วน!",
        },
        "phonenumber": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!",
            number: "กรุณากรอกเป็นตัวเลขเท่านั้น"
        },
        "cid": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "sex": {
            required: "กรุณาเลือกข้อมูลให้ครบถ้วน!"
        },
        "status_patient_id": {
            required: "กรุณาเลือกข้อมูลให้ครบถ้วน!"
        },
        "first_name_father": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "last_name_father": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "first_name_mother": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "last_name_mother": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "first_name_relation": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "last_name_relation": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "relation_tel": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "relationship": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "home_id": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },

        "district": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "amphoe": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "province": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
        "zip_code": {
            required: "กรุณากรอกข้อมูลให้ครบถ้วน!"
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group > div").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
    },
});
