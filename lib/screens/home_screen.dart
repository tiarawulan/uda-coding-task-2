import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Home"),
        backgroundColor: Colors.green,
      ),
      body: const Center(
        child: Text(
          "Welcome to HealthCare!",
          style: TextStyle(fontSize: 20),
        ),
      ),
    );
  }
}
