"use strict";

// Class definition
var KTWizard2 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Maaf, lengkapi data terlebih dahulu.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			Swal.fire({
				text: "All is good! Please confirm the form submission.",
				icon: "success",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, submit!",
				cancelButtonText: "No, cancel",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
				if (result.value) {
					_formEl.submit(); // Submit form
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been submitted!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-primary",
						}
					});
				}
			});
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					nisn: {
						validators: {
							notEmpty: {
								message: 'NISN wajib diisi'
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: 'Nama wajib diisi'
							}
						}
					},
					nik: {
						validators: {
							notEmpty: {
								message: 'NIK wajib diisi'
							}
						}
					},
					jenis_kelamin: {
						validators: {
							notEmpty: {
								message: 'Jenis kelamin wajib diisi'
							}
						}
					},
					agama: {
						validators: {
							notEmpty: {
								message: 'Agama wajib diisi'
							}
						}
					},
					tempat_lahir: {
						validators: {
							notEmpty: {
								message: 'Tempat lahir wajib diisi'
							}
						}
					},
					tanggal_lahir: {
						validators: {
							notEmpty: {
								message: 'Tanggal lahir wajib diisi'
							}
						}
					},
					nohp: {
						validators: {
							notEmpty: {
								message: 'Nomor HP wajib diisi'
							}
						}
					},
					kelas: {
						validators: {
							notEmpty: {
								message: 'Kelas wajib diisi'
							}
						}
					},
					ukuran_baju: {
						validators: {
							notEmpty: {
								message: 'Ukuran baju wajib diisi'
							}
						}
					},
					kelurahan: {
						validators: {
							notEmpty: {
								message: 'Kelurahan wajib diisi'
							}
						}
					},
					district_id: {
						validators: {
							notEmpty: {
								message: 'Kecamatan wajib diisi'
							}
						}
					},
					jalan: {
						validators: {
							notEmpty: {
								message: 'Jalan wajib diisi'
							}
						}
					},
					no_rmh: {
						validators: {
							notEmpty: {
								message: 'Nomor rumah wajib diisi'
							}
						}
					},
					rt_rw: {
						validators: {
							notEmpty: {
								message: 'RT/RW wajib diisi'
							}
						}
					},
					kodepos: {
						validators: {
							notEmpty: {
								message: 'Kode pos wajib diisi'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					npsn: {
						validators: {
							notEmpty: {
								message: 'NPSN wajib diisi'
							}
						}
					},
					jenjang_id: {
						validators: {
							notEmpty: {
								message: 'Jenjang wajib diisi'
							}
						}
					},
					nama_sekolah: {
						validators: {
							notEmpty: {
								message: 'Nama sekolah wajib diisi'
							}
						}
					},
					telp_sekolah: {
						validators: {
							notEmpty: {
								message: 'Telefon sekolah wajib diisi'
							}
						}
					},
					jenis_sekolah: {
						validators: {
							notEmpty: {
								message: 'Jenis sekolah wajib diisi'
							}
						}
					},
					kelurahan_sekolah: {
						validators: {
							notEmpty: {
								message: 'Kelurahan sekolah wajib diisi'
							}
						}
					},
					district_sekolah_id: {
						validators: {
							notEmpty: {
								message: 'Kecamatan sekolah wajib diisi'
							}
						}
					},
					jalan_sekolah: {
						validators: {
							notEmpty: {
								message: 'Jalan sekolah wajib diisi'
							}
						}
					},
					no_rmh_sekolah: {
						validators: {
							notEmpty: {
								message: 'Nomor rumah wajib diisi'
							}
						}
					},
					rt_rw_sekolah: {
						validators: {
							notEmpty: {
								message: 'RT RW sekolah wajib diisi'
							}
						}
					},
					kodepos_sekolah: {
						validators: {
							notEmpty: {
								message: 'Kode pos sekolah wajib diisi'
							}
						}
					},
					
					city: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					bidang_id: {
						validators: {
							notEmpty: {
								message: 'Bidang wajib dipilih salah satu'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 4
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email wajib diisi'
							},
							emailAddress: {
								message: 'Alamat email tidak valid'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Kata sandi wajib diisi'
							}
						}
					},
					info: {
						validators: {
							notEmpty: {
								message: 'Survey wajib diisi'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 5
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					ccname: {
						validators: {
							notEmpty: {
								message: 'Credit card name is required'
							}
						}
					},
					ccnumber: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					ccmonth: {
						validators: {
							notEmpty: {
								message: 'Credit card month is required'
							}
						}
					},
					ccyear: {
						validators: {
							notEmpty: {
								message: 'Credit card year is required'
							}
						}
					},
					cccvv: {
						validators: {
							notEmpty: {
								message: 'Credit card CVV is required'
							},
							digits: {
								message: 'The CVV value is not valid. Only numbers is allowed'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard2.init();
});
