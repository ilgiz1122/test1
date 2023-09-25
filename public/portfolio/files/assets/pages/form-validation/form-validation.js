"use strict";
$(document).ready(function () {
  validate.extend(validate.validators.datetime, {
    parse: function (value, options) {
      return +moment.utc(value);
    },
    format: function (value, options) {
      var format = options.dateOnly ? "DD/MM/YYYY" : "DD/MM/YYYY";
      return moment.utc(value).format(format);
    },
  });
  var constraints = {
    email: { presence: true, email: true },
    password: { presence: true, length: { minimum: 5 } },
    "repeat-password": {
      presence: true,
      equality: {
        attribute: "password",
        message: "^The passwords does not match",
      },
    },
    name: {
      presence: true,
      length: { minimum: 3, maximum: 20 },
      format: {
        pattern: "[a-z0-9]+",
        flags: "i",
        message: "can only contain a-z and 0-9",
      },
    },
    addon: {
      presence: true,
      length: { minimum: 3, maximum: 20 },
      format: {
        pattern: "[a-z0-9]+",
        flags: "i",
        message: "can only contain a-z and 0-9",
      },
    },
    maxlength: {
      presence: true,
      numericality: { onlyNumeric: true, greaterThan: 10 },
    },
    minlength: {
      presence: true,
      numericality: { onlyNumeric: true, lessThan: 5 },
    },
    gender: { presence: true },
  };
  var form = document.querySelector("form#main");
  form.addEventListener("submit", function (ev) {
    ev.preventDefault();
    handleFormSubmit(form);
  });
  var inputs = document.querySelectorAll("input, textarea, select");
  for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function (ev) {
      var errors = validate(form, constraints) || {};
      showErrorsForInput(this, errors[this.name]);
    });
  }
  function handleFormSubmit(form, input) {
    var errors = validate(form, constraints);
    showErrors(form, errors || {});
    if (!errors) {
      showSuccess();
    }
  }
  function showErrors(form, errors) {
    _.each(
      form.querySelectorAll("input[name], select[name]"),
      function (input) {
        showErrorsForInput(input, errors && errors[input.name]);
      }
    );
  }
  function showErrorsForInput(input, errors) {
    var formGroup = closestParent(input.parentNode, "form-group"),
      messages = formGroup.querySelector(".messages");
    resetFormGroup(formGroup);
    if (errors) {
      formGroup.classList.add("has-error");
      _.each(errors, function (error) {
        addError(messages, error, input);
      });
    } else {
      formGroup.classList.add("has-success");
    }
  }
  function closestParent(child, className) {
    if (!child || child == document) {
      return null;
    }
    if (child.classList.contains(className)) {
      return child;
    } else {
      return closestParent(child.parentNode, className);
    }
  }
  function resetFormGroup(formGroup) {
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    _.each(formGroup.querySelectorAll(".text-danger"), function (el) {
      el.parentNode.removeChild(el);
    });
  }
  function addError(messages, error, input) {
    var block = document.createElement("p");
    block.classList.add("text-danger");
    block.classList.add("error");
    block.innerText = error;
    messages.appendChild(block);
    $(input).addClass("input-danger");
  }
  function showSuccess() {
    alert("Success!");
  }
  var constraints1 = {
    Username: {
      presence: true,
      length: { minimum: 3, maximum: 20 },
      format: {
        pattern: "[a-z0-9]+",
        flags: "i",
        message: "can only contain a-z and 0-9",
      },
    },
    Email: { presence: true, email: true },
  };
  var form1 = document.querySelector("form#second");
  form1.addEventListener("submit", function (ev) {
    ev.preventDefault();
    handleFormSubmit1(form1);
  });
  var inputs1 = document.querySelectorAll("input, textarea, select");
  for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function (ev) {
      var errors = validate(form1, constraints1) || {};
      showErrorsForInput1(this, errors[this.name]);
    });
  }
  function handleFormSubmit1(form, input) {
    var errors = validate(form, constraints1);
    showErrors1(form, errors || {});
    if (!errors) {
      showSuccess1();
    }
  }
  function showErrors1(form, errors) {
    _.each(
      form.querySelectorAll("input[name], select[name]"),
      function (input) {
        showErrorsForInput1(input, errors && errors[input.name]);
      }
    );
  }
  function showErrorsForInput1(input, errors) {
    var formGroup = closestParent1(input.parentNode, "form-group"),
      messages = formGroup.querySelector(".messages");
    resetFormGroup1(formGroup);
    if (errors) {
      formGroup.classList.add("has-error");
      _.each(errors, function (error) {
        addError1(messages, error);
      });
    } else {
      formGroup.classList.add("has-success");
    }
  }
  function closestParent1(child, className) {
    if (!child || child == document) {
      return null;
    }
    if (child.classList.contains(className)) {
      return child;
    } else {
      return closestParent1(child.parentNode, className);
    }
  }
  function resetFormGroup1(formGroup) {
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    _.each(formGroup.querySelectorAll(".text-danger"), function (el) {
      el.parentNode.removeChild(el);
    });
  }
  function addError1(messages, error) {
    var block = document.createElement("i");
    block.classList.add("text-danger");
    block.classList.add("error");
    block.classList.add("icofont");
    block.classList.add("icofont-close-circled");
    messages.appendChild(block);
    $(block).attr("data-toggle", "tooltip");
    $(block).attr("data-placement", "top");
    $(block).attr("data-trigger", "hover");
    $(block).attr("title", error);
    $('[data-toggle="tooltip"]').tooltip();
    return false;
  }
  function showSuccess1() {
    alert("Success!");
  }
  var constraints2 = {
    integer: { presence: true, numericality: { onlyInteger: true } },
    numeric: { presence: true, numericality: { onlyNumeric: true } },
    Number: {
      presence: true,
      numericality: { onlyNumeric: true, greaterThan: 50 },
    },
    Numbers: {
      presence: true,
      numericality: { onlyNumeric: true, lessThan: 50 },
    },
  };
  var form2 = document.querySelector("form#number_form");
  form2.addEventListener("submit", function (ev) {
    ev.preventDefault();
    handleFormSubmit2(form2);
  });
  var inputs2 = document.querySelectorAll("input, textarea, select");
  for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function (ev) {
      var errors = validate(form, constraints2) || {};
      showErrorsForInput2(this, errors[this.name]);
    });
  }
  function handleFormSubmit2(form, input) {
    var errors = validate(form, constraints2);
    showErrors2(form, errors || {});
    if (!errors) {
      showSuccess2();
    }
  }
  function showErrors2(form, errors) {
    _.each(
      form.querySelectorAll("input[name], select[name]"),
      function (input) {
        showErrorsForInput2(input, errors && errors[input.name]);
      }
    );
  }
  function showErrorsForInput2(input, errors) {
    var formGroup = closestParent2(input.parentNode, "form-group"),
      messages = formGroup.querySelector(".messages");
    resetFormGroup2(formGroup);
    if (errors) {
      formGroup.classList.add("has-error");
      _.each(errors, function (error) {
        addError2(messages, error, input);
      });
    } else {
      formGroup.classList.add("has-success");
    }
  }
  function closestParent2(child, className) {
    if (!child || child == document) {
      return null;
    }
    if (child.classList.contains(className)) {
      return child;
    } else {
      return closestParent2(child.parentNode, className);
    }
  }
  function resetFormGroup2(formGroup) {
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    _.each(formGroup.querySelectorAll(".text-danger"), function (el) {
      el.parentNode.removeChild(el);
    });
  }
  function addError2(messages, error, input) {
    var block = document.createElement("p");
    block.classList.add("text-danger");
    block.classList.add("error");
    block.innerText = error;
    messages.appendChild(block);
    $(input).addClass("input-danger");
  }
  function showSuccess2() {
    alert("Success!");
  }
  var constraints3 = {
    member: { presence: true },
    Language: { presence: true },
  };
  var form3 = document.querySelector("form#checkdrop");
  form3.addEventListener("submit", function (ev) {
    ev.preventDefault();
    handleFormSubmit3(form3);
  });
  var inputs3 = document.querySelectorAll("input, textarea, select");
  for (var i = 0; i < inputs3.length; ++i) {
    inputs.item(i).addEventListener("change", function (ev) {
      var errors = validate(form3, constraints3) || {};
      showErrorsForInput3(this, errors[this.name]);
    });
  }
  function handleFormSubmit3(form, input) {
    var errors = validate(form, constraints3);
    showErrors3(form, errors || {});
    if (!errors) {
      showSuccess3();
    }
  }
  function showErrors3(form, errors) {
    _.each(
      form.querySelectorAll("input[name], select[name]"),
      function (input) {
        showErrorsForInput3(input, errors && errors[input.name]);
      }
    );
  }
  function showErrorsForInput3(input, errors) {
    var formGroup = closestParent3(input.parentNode, "form-group"),
      messages = formGroup.querySelector(".messages");
    resetFormGroup3(formGroup);
    if (errors) {
      formGroup.classList.add("has-error");
      _.each(errors, function (error) {
        addError3(messages, error, input);
      });
    } else {
      formGroup.classList.add("has-success");
    }
  }
  function closestParent3(child, className) {
    if (!child || child == document) {
      return null;
    }
    if (child.classList.contains(className)) {
      return child;
    } else {
      return closestParent3(child.parentNode, className);
    }
  }
  function resetFormGroup3(formGroup) {
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    _.each(formGroup.querySelectorAll(".text-danger"), function (el) {
      el.parentNode.removeChild(el);
    });
  }
  function addError3(messages, error, input) {
    var block = document.createElement("p");
    block.classList.add("text-danger");
    block.classList.add("error");
    block.innerText = error;
    messages.appendChild(block);
    $(input).addClass("input-danger");
  }
  function showSuccess3() {
    alert("Success!");
  }
});
