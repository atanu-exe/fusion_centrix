<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payslip - {{ $salary->user->name }} - {{ $salary->month }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            font-size: 14px;
            color: #333;
        }
        .payslip {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #0d6efd, #0056b3);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }
        .header p {
            opacity: 0.9;
        }
        .payslip-title {
            background: #f8f9fa;
            padding: 15px 30px;
            border-bottom: 2px solid #0d6efd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .payslip-title h2 {
            color: #0d6efd;
            font-size: 20px;
        }
        .payslip-title .month {
            font-size: 18px;
            color: #666;
        }
        .content {
            padding: 30px;
        }
        .employee-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .info-group h4 {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .info-group p {
            font-size: 16px;
            color: #333;
        }
        .salary-details {
            margin-bottom: 30px;
        }
        .salary-table {
            width: 100%;
            border-collapse: collapse;
        }
        .salary-table th,
        .salary-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .salary-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            font-size: 12px;
        }
        .salary-table td:last-child {
            text-align: right;
        }
        .salary-table tr:last-child td {
            border-bottom: none;
        }
        .earnings {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .earnings .section-header {
            background: #d4edda;
            color: #155724;
            padding: 10px 15px;
            font-weight: 600;
        }
        .deductions {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .deductions .section-header {
            background: #f8d7da;
            color: #721c24;
            padding: 10px 15px;
            font-weight: 600;
        }
        .net-salary {
            background: linear-gradient(135deg, #198754, #157347);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-top: 20px;
        }
        .net-salary h3 {
            font-size: 18px;
        }
        .net-salary .amount {
            font-size: 32px;
            font-weight: 700;
        }
        .footer {
            padding: 20px 30px;
            background: #f8f9fa;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
        }
        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
        }
        .signature-box {
            text-align: center;
            width: 200px;
        }
        .signature-box .line {
            border-top: 1px solid #333;
            margin-bottom: 5px;
        }
        .payment-info {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        .payment-info h4 {
            color: #856404;
            margin-bottom: 10px;
        }
        .payment-info p {
            color: #856404;
            margin: 5px 0;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-paid {
            background: #d4edda;
            color: #155724;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .payslip {
                box-shadow: none;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 30px; background: #0d6efd; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            <i class="fas fa-print"></i> Print Payslip
        </button>
        <button onclick="window.close()" style="padding: 10px 30px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-left: 10px;">
            Close
        </button>
    </div>

    <div class="payslip">
        <div class="header">
            <h1>{{ config('app.name', 'FusionCentrix') }}</h1>
            <p>Your Company Address, City, State - PIN Code</p>
        </div>

        <div class="payslip-title">
            <h2>Salary Payslip</h2>
            <span class="month">{{ \Carbon\Carbon::parse($salary->month . '-01')->format('F Y') }}</span>
        </div>

        <div class="content">
            <div class="employee-info">
                <div class="info-group">
                    <h4>Employee Name</h4>
                    <p>{{ $salary->user->name }}</p>
                </div>
                <div class="info-group">
                    <h4>Employee ID</h4>
                    <p>EMP-{{ str_pad($salary->user->id, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="info-group">
                    <h4>Email</h4>
                    <p>{{ $salary->user->email }}</p>
                </div>
                <div class="info-group">
                    <h4>Department</h4>
                    <p>{{ $salary->user->employeeDetail->department ?? 'General' }}</p>
                </div>
                <div class="info-group">
                    <h4>Designation</h4>
                    <p>{{ $salary->user->employeeDetail->designation ?? ucwords(str_replace('_', ' ', $salary->user->user_type)) }}</p>
                </div>
                <div class="info-group">
                    <h4>Status</h4>
                    <p>
                        @if($salary->status === 'paid')
                            <span class="status-badge status-paid">Paid</span>
                        @else
                            <span class="status-badge status-pending">{{ ucfirst($salary->status) }}</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="salary-details">
                <div class="earnings">
                    <div class="section-header">Earnings</div>
                    <table class="salary-table">
                        <tr>
                            <td>Basic Salary</td>
                            <td>₹{{ number_format($salary->basic_salary, 2) }}</td>
                        </tr>
                        @if($salary->hra > 0)
                        <tr>
                            <td>House Rent Allowance (HRA)</td>
                            <td>₹{{ number_format($salary->hra, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->da > 0)
                        <tr>
                            <td>Dearness Allowance (DA)</td>
                            <td>₹{{ number_format($salary->da, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->ta > 0)
                        <tr>
                            <td>Travel Allowance (TA)</td>
                            <td>₹{{ number_format($salary->ta, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->medical_allowance > 0)
                        <tr>
                            <td>Medical Allowance</td>
                            <td>₹{{ number_format($salary->medical_allowance, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->bonus > 0)
                        <tr>
                            <td>Bonus</td>
                            <td>₹{{ number_format($salary->bonus, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->overtime_pay > 0)
                        <tr>
                            <td>Overtime Pay</td>
                            <td>₹{{ number_format($salary->overtime_pay, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->other_allowances > 0)
                        <tr>
                            <td>Other Allowances</td>
                            <td>₹{{ number_format($salary->other_allowances, 2) }}</td>
                        </tr>
                        @endif
                        <tr style="background: #f0fff0; font-weight: 600;">
                            <td>Total Earnings</td>
                            <td>₹{{ number_format($salary->gross_salary, 2) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="deductions">
                    <div class="section-header">Deductions</div>
                    <table class="salary-table">
                        @if($salary->pf > 0)
                        <tr>
                            <td>Provident Fund (PF)</td>
                            <td>₹{{ number_format($salary->pf, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->esi > 0)
                        <tr>
                            <td>Employee State Insurance (ESI)</td>
                            <td>₹{{ number_format($salary->esi, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->professional_tax > 0)
                        <tr>
                            <td>Professional Tax</td>
                            <td>₹{{ number_format($salary->professional_tax, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->tds > 0)
                        <tr>
                            <td>Tax Deducted at Source (TDS)</td>
                            <td>₹{{ number_format($salary->tds, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->loan_deduction > 0)
                        <tr>
                            <td>Loan Deduction</td>
                            <td>₹{{ number_format($salary->loan_deduction, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->leave_deduction > 0)
                        <tr>
                            <td>Leave Deduction</td>
                            <td>₹{{ number_format($salary->leave_deduction, 2) }}</td>
                        </tr>
                        @endif
                        @if($salary->other_deductions > 0)
                        <tr>
                            <td>Other Deductions</td>
                            <td>₹{{ number_format($salary->other_deductions, 2) }}</td>
                        </tr>
                        @endif
                        <tr style="background: #fff0f0; font-weight: 600;">
                            <td>Total Deductions</td>
                            <td>₹{{ number_format($salary->total_deductions, 2) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="net-salary">
                    <h3>Net Salary</h3>
                    <span class="amount">₹{{ number_format($salary->net_salary, 2) }}</span>
                </div>

                @if($salary->status === 'paid')
                <div class="payment-info">
                    <h4><i class="fas fa-check-circle"></i> Payment Information</h4>
                    <p><strong>Payment Date:</strong> {{ $salary->payment_date ? \Carbon\Carbon::parse($salary->payment_date)->format('d M Y') : 'N/A' }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($salary->payment_method ?? 'Bank Transfer') }}</p>
                    @if($salary->transaction_id)
                    <p><strong>Transaction ID:</strong> {{ $salary->transaction_id }}</p>
                    @endif
                </div>
                @endif

                <div class="signature">
                    <div class="signature-box">
                        <div class="line"></div>
                        <p>Employee Signature</p>
                    </div>
                    <div class="signature-box">
                        <div class="line"></div>
                        <p>Authorized Signature</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <span>Generated on: {{ now()->format('d M Y, h:i A') }}</span>
            <span>This is a computer-generated payslip</span>
        </div>
    </div>
</body>
</html>
