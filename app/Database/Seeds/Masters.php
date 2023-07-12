<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Masters extends Seeder
{
    public function run()
    {
        $business_types = [
            ['type' => 'Job Worker'],
            ['type' => 'Export']
        ];

        $this->db->query('DELETE FROM mst_business_type');
        $this->db->query('ALTER TABLE mst_business_type AUTO_INCREMENT = 1');
        $this->db->table('mst_business_type')->insertBatch($business_types);

        $call_related = [
            ['related' => 'Enquiry',],
            ['related' => 'Service Call',]
        ];

        $this->db->query('DELETE FROM mst_call_related');
        $this->db->query('ALTER TABLE mst_call_related AUTO_INCREMENT = 1');
        $this->db->table('mst_call_related')->insertBatch($call_related);

        $call_type = [
            ['type' => 'Phone Call',],
            ['type' => 'E-Mail',]
        ];
        $this->db->query('DELETE FROM mst_call_type');
        $this->db->query('ALTER TABLE mst_call_type AUTO_INCREMENT = 1');
        $this->db->table('mst_call_type')->insertBatch($call_type);

        $company = [
            'name' => 'Golden Falcon International Ltd.',
            'phone' => 83443,
            'landline' => '+91 421 4331319',
            'street' => '#204, Sri Ranga Complex, 41/28, Rajarao Street',
            'city' => 'Tirupur',
            'district' => 'Tirupur',
            'state' => 'Tamil Nadu',
            'pincode' => 641601,
            'email' => 'info@goldenfalconinternational.com',
            'website' => 'www.goldenfalconinternational.com',
            'pan_number' => 's',
            'gst_number' => 's',
            'logo' => 'https://goldenfalconinternational.com',
            'is_active' => true,
        ];
        $this->db->query('DELETE FROM mst_company');
        $this->db->query('ALTER TABLE mst_company AUTO_INCREMENT = 1');
        $this->db->table('mst_company')->insert($company);

        $currency = [
            [
                'code' => 'INR',
                'symbol' => '₹',
                'description' => 'Indian Rupees',
            ],
            [
                'code' => 'USD',
                'symbol' => '$',
                'description' => 'United States Doller',
            ]
        ];
        $this->db->query('DELETE FROM mst_currency');
        $this->db->query('ALTER TABLE mst_currency AUTO_INCREMENT = 1');
        $this->db->table('mst_currency')->insertBatch($currency);

        $customer_type = [
            ['type' => 'JobSeeker',],
            ['type' => 'Exporter',]
        ];
        $this->db->query("DELETE FROM mst_customer_type");
        $this->db->query("ALTER TABLE mst_customer_type AUTO_INCREMENT = 1");
        $this->db->table('mst_customer_type')->insertBatch($customer_type);

        $department = [
            [
                'code' => 'FLT',
                'name' => 'Flat Knitting',
            ],
            [
                'code' => 'CLT',
                'name' => 'Circular Knitting',
            ],
            [
                'code' => 'NEED',
                'name' => 'Knitting Needle',
            ],
            [
                'code' => 'EMB',
                'name' => 'Embroidery',
            ],
            [
                'code' => 'PRT',
                'name' => 'Printing',
            ],
            [
                'code' => 'ADM',
                'name' => 'Administration',
            ],
            [
                'code' => 'CC',
                'name' => 'Customer Care',
            ]
        ];
        $this->db->query("DELETE FROM mst_department");
        $this->db->query("ALTER TABLE mst_department AUTO_INCREMENT = 1");
        $this->db->table('mst_department')->insertBatch($department);

        $designation = [
            ['designation' => 'CEO / Director',],
            ['designation' => 'Business Development Manager',],
            ['designation' => 'Executive - Sales & Service',],
            ['designation' => 'Assistant Manager - Sales & Service',],
            ['designation' => 'Senior Service Engineer',],
            ['designation' => 'Service Engineer',],
            ['designation' => 'Sales Executive',],
            ['designation' => 'Design Engineer',],
            ['designation' => 'Executive - Customer Support & Store',],
            ['designation' => 'Admin-Asst',]
        ];
        $this->db->query("DELETE FROM mst_designation");
        $this->db->query("ALTER TABLE mst_designation AUTO_INCREMENT =1 ");
        $this->db->table('mst_designation')->insertBatch($designation);

        $invoice_status = [
            ['status' => 'draft',],
            ['status' => 'completed',]
        ];
        $this->db->query("DELETE FROM mst_invoice_status");
        $this->db->query("ALTER TABLE mst_invoice_status AUTO_INCREMENT=1");
        $this->db->table('mst_invoice_status')->insertBatch($invoice_status);

        $payment_method = [
            ['method' => 'Cash',],
            ['method' => 'Demand Draft',],
            ['method' => 'Cheque',],
            ['method' => 'Account Transfer IMPS/RTGS',],
            ['method' => 'Credit/Debit Card',],
            ['method' => 'UPI Payment',]

        ];
        $this->db->query("DELETE FROM mst_payment_method");
        $this->db->query("ALTER TABLE mst_payment_method AUTO_INCREMENT=1");
        $this->db->table('mst_payment_method')->insertBatch($payment_method);

        $service_type = [
            ['type' => 'Warrenty',],
            ['type' => 'AMC',],
            ['type' => 'Non-Warrenty',],
        ];
        $this->db->query("DELETE FROM mst_service_type");
        $this->db->query("ALTER TABLE mst_service_type AUTO_INCREMENT=1");
        $this->db->table('mst_service_type')->insertBatch($service_type);


        $status = [
            ['status' => 'Confirmed',],
            ['status' => 'Quotation Requested',],
            ['status' => 'In Process',],
            ['status' => 'Rejected / Loosed',],
            ['status' => 'Completed',],
            ['status' => 'Pending',],
            ['status' => 'Work in Process',],
            ['status' => 'Long Pending',]
        ];
        $this->db->query("DELETE FROM mst_status");
        $this->db->query("ALTER TABLE mst_status AUTO_INCREMENT=1");
        $this->db->table('mst_status')->insertBatch($status);
    }
}