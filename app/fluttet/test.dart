// lib/validators.dart

String? validateEmail(String? value) {
  if (value == null || value.isEmpty) {
    return 'الرجاء إدخال البريد الإلكتروني';
  }
  if (!RegExp(r'\S+@\S+\.\S+').hasMatch(value)) {
    return 'بريد إلكتروني غير صالح';
  }
  return null;
}

String? validatePassword(String? value) {
  if (value == null || value.isEmpty) {
    return 'الرجاء إدخال كلمة المرور';
  }
  if (value.length < 6) {
    return 'كلمة المرور يجب أن تكون 6 أحرف على الأقل';
  }
  return null;
}

String? validateConfirmPassword(String? value, String password) {
  if (value == null || value.isEmpty) {
    return 'الرجاء تأكيد كلمة المرور';
  }
  if (value != password) {
    return 'كلمتا المرور غير متطابقتين';
  }
  return null;
}

String? validateName(String? value) {
  if (value == null || value.trim().isEmpty) {
    return 'الرجاء إدخال الاسم';
  }
  if (value.length < 2) {
    return 'الاسم قصير جداً';
  }
  return null;
}

String? validatePhone(String? value) {
  if (value == null || value.isEmpty) {
    return 'الرجاء إدخال رقم الهاتف';
  }
  if (!RegExp(r'^\+?[0-9]{9,15}$').hasMatch(value)) {
    return 'رقم الهاتف غير صالح';
  }
  return null;
}

String? validateRequired(String? value, [String fieldName = 'هذا الحقل']) {
  if (value == null || value.trim().isEmpty) {
    return 'الرجاء إدخال $fieldName';
  }
  return null;
}
TextFormField(
  decoration: const InputDecoration(labelText: 'Confirm Password'),
  obscureText: true,
  validator: (value) => validateConfirmPassword(value, _passwordController.text),
)
TextFormField(
  decoration: const InputDecoration(labelText: 'Address'),
  validator: (value) => validateRequired(value, 'العنوان'),
)
