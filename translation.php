<?php
    function __translate_array($lang, $string, $before = null, $after = null, $return = false) {
        $fa = [
            'close' => 'بستن',
            'tag' => 'برچسب',
            'tags' => 'برچسب‌ها',
            'category' => 'دسته‌بندی',
            'categories' => 'دسته‌بندی‌ها',
            'no products found.' => 'محصولی یافت نشد.',
            'product out of stock.' => 'محصول موجود نمی‌باشد.',
            'shopping_cart' => 'سبد خرید',
            'oders_archive' => 'آرشیو سفارشات',
            'added to cart.' => 'به سبد خرید اضافه شد.',
            'your cart is empty.' => 'سبد خرید شما خالی می‌باشد.',
            'you haven\'t any orders yet.' => 'هنوز سفارشی ثبت نکرده‌اید.',
            'factor final price: ' => 'قابل پرداخت:',
            'archive:' => 'آرشیو:',
            'showing archive:' => 'نمایش آرشیو:',
            'processing' => 'در حال پردازش',
            'cancelled' => 'لفو شده',
            'pending payment' => 'در انتظار پرداخت',
            'failed' => 'خطا',
            'completed' => 'اتمام',
            'on hold' => 'در انتظار',
            'register' => 'ثبت نام',
            'you registered successfully.' => 'ثبت نام شما با موفقیت صورت گرفت.',
            'post delivery price' => 'هزینه ارسال (پست)',
            'book introduction' => 'معرفی کتاب',
            'search query' => 'عبارت جستجو',
            'showing results for: ' => 'نمایش نتایج جستجو برای: ',
            'item count singular' => 'عدد',
        ];
        if ($return) {
            return $before . $$lang[$string] . $after;
        } else {
            echo $before . $$lang[$string] . $after;
        }
    }