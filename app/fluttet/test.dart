import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Galileo Design',
      theme: ThemeData(
        fontFamily: 'Public Sans',
      ),
      home: const LoansPage(),
    );
  }
}

class LoansPage extends StatelessWidget {
  const LoansPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFF9FAFA),
      body: SafeArea(
        child: Column(
          children: [
            // Header
            Padding(
              padding: const EdgeInsets.all(16.0).copyWith(bottom: 8),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Container(
                    width: 48,
                    height: 48,
                    alignment: Alignment.center,
                    child: const Icon(
                      Icons.arrow_back,
                      size: 24,
                      color: Color(0xFF121715),
                    ),
                  ),
                ],
              ),
            ),
            
            // Title
            Padding(
              padding: const EdgeInsets.fromLTRB(16, 20, 16, 12),
              child: Align(
                alignment: Alignment.centerLeft,
                child: Text(
                  'Available Loans',
                  style: TextStyle(
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                    color: const Color(0xFF121715),
                    letterSpacing: -0.015,
                  ),
                ),
              ),
            ),
            
            // Search bar
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
              child: Container(
                height: 48,
                decoration: BoxDecoration(
                  color: const Color(0xFFEBEFEE),
                  borderRadius: BorderRadius.circular(12),
                ),
                child: Row(
                  children: [
                    const Padding(
                      padding: EdgeInsets.all(12.0),
                      child: Icon(
                        Icons.search,
                        size: 24,
                        color: Color(0xFF667F77),
                      ),
                    ),
                    Expanded(
                      child: TextField(
                        decoration: InputDecoration(
                          hintText: 'Search Loans',
                          hintStyle: TextStyle(
                            color: const Color(0xFF667F77),
                            fontSize: 16,
                            fontWeight: FontWeight.normal,
                          ),
                          border: InputBorder.none,
                          focusedBorder: InputBorder.none,
                          enabledBorder: InputBorder.none,
                          errorBorder: InputBorder.none,
                          disabledBorder: InputBorder.none,
                        ),
                        style: TextStyle(
                          color: const Color(0xFF121715),
                          fontSize: 16,
                          fontWeight: FontWeight.normal,
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            
            // Filter chips
            Padding(
              padding: const EdgeInsets.fromLTRB(12, 12, 16, 12),
              child: SingleChildScrollView(
                scrollDirection: Axis.horizontal,
                child: Row(
                  children: [
                    _buildFilterChip('Interest Rate'),
                    const SizedBox(width: 12),
                    _buildFilterChip('Loan Amount'),
                    const SizedBox(width: 12),
                    _buildFilterChip('Loan Term'),
                  ],
                ),
              ),
            ),
            
            // Loan items
            Expanded(
              child: ListView(
                children: [
                  _buildLoanItem(
                    icon: Icons.account_balance,
                    title: 'Personal Loan',
                    subtitle: 'As low as 6.99% APR',
                    amount: '\$10,000 - \$50,000',
                  ),
                  _buildLoanItem(
                    icon: Icons.directions_car,
                    title: 'Auto Loan',
                    subtitle: 'As low as 7.50% APR',
                    amount: '\$5,000 - \$40,000',
                  ),
                  _buildLoanItem(
                    icon: Icons.home,
                    title: 'Home Loan',
                    subtitle: 'As low as 5.50% APR',
                    amount: '\$20,000 - \$500,000',
                  ),
                  _buildLoanItem(
                    icon: Icons.school,
                    title: 'Student Loan',
                    subtitle: 'As low as 8.25% APR',
                    amount: '\$1,000 - \$100,000',
                  ),
                ],
              ),
            ),
            
            // Bottom navigation bar
            Column(
              children: [
                const Divider(height: 1, color: Color(0xFFEBEFEE)),
                Padding(
                  padding: const EdgeInsets.fromLTRB(16, 8, 16, 8),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    children: [
                      _buildBottomNavItem(Icons.home_outlined, 'Home', false),
                      _buildBottomNavItem(Icons.receipt_outlined, 'Transactions', false),
                      _buildBottomNavItem(Icons.credit_card_outlined, 'Accounts', false),
                      _buildBottomNavItem(Icons.monetization_on_outlined, 'Loans', true),
                      _buildBottomNavItem(Icons.person_outline, 'Profile', false),
                    ],
                  ),
                ),
                Container(height: 20, color: const Color(0xFFF9FAFA)),
              ],
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildFilterChip(String text) {
    return Container(
      height: 32,
      padding: const EdgeInsets.symmetric(horizontal: 16),
      decoration: BoxDecoration(
        color: const Color(0xFFEBEFEE),
        borderRadius: BorderRadius.circular(12),
      ),
      child: Center(
        child: Text(
          text,
          style: TextStyle(
            color: const Color(0xFF121715),
            fontSize: 14,
            fontWeight: FontWeight.w500,
          ),
        ),
      ),
    );
  }

  Widget _buildLoanItem({
    required IconData icon,
    required String title,
    required String subtitle,
    required String amount,
  }) {
    return Container(
      color: const Color(0xFFF9FAFA),
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
      height: 72,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Row(
            children: [
              Container(
                width: 48,
                height: 48,
                decoration: BoxDecoration(
                  color: const Color(0xFFEBEFEE),
                  borderRadius: BorderRadius.circular(8),
                ),
                child: Icon(icon, size: 24, color: const Color(0xFF121715)),
              ),
              const SizedBox(width: 16),
              Column(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    title,
                    style: TextStyle(
                      color: const Color(0xFF121715),
                      fontSize: 16,
                      fontWeight: FontWeight.w500,
                    ),
                  ),
                  Text(
                    subtitle,
                    style: TextStyle(
                      color: const Color(0xFF667F77),
                      fontSize: 14,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                ],
              ),
            ],
          ),
          Text(
            amount,
            style: TextStyle(
              color: const Color(0xFF121715),
              fontSize: 16,
              fontWeight: FontWeight.normal,
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildBottomNavItem(IconData icon, String label, bool isActive) {
    return Column(
      mainAxisSize: MainAxisSize.min,
      children: [
        Icon(
          icon,
          size: 24,
          color: isActive ? const Color(0xFF121715) : const Color(0xFF667F77),
        ),
        const SizedBox(height: 4),
        Text(
          label,
          style: TextStyle(
            fontSize: 12,
            fontWeight: FontWeight.w500,
            letterSpacing: 0.015,
            color: isActive ? const Color(0xFF121715) : const Color(0xFF667F77),
          ),
        ),
      ],
    );
  }
}
theme: ThemeData(
  textTheme: GoogleFonts.publicSansTextTheme(),
),