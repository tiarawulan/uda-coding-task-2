import 'package:http/http.dart' as http;
import 'dart:convert';

class ApiService {
  // Fungsi untuk registrasi
  Future<Map<String, dynamic>> register(
      String name, String username, String email, String password) async {
    try {
      final response = await http.post(
        Uri.parse(
            'http://192.168.43.2/api_rumah_sakit/register.php'), // Sesuaikan URL API
        headers: {'Content-Type': 'application/json'},
        body: jsonEncode({
          'name': name,
          'username': username,
          'email': email,
          'password': password,
        }),
      );

      if (response.statusCode == 200) {
        return json.decode(response.body);
      } else {
        return {'status': 'error', 'message': 'Server error'};
      }
    } catch (e) {
      return {'status': 'error', 'message': e.toString()};
    }
  }

  login(String text, String text2) {}
}
