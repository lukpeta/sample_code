<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $small_content
 * @property string|null $content
 * @property int $gallery_id
 * @property \Illuminate\Support\Carbon $visibility_date_from
 * @property \Illuminate\Support\Carbon $visibility_date_to
 * @property \Illuminate\Support\Carbon $event_date
 * @property bool $is_enable
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $formated_date
 * @property-read \App\Models\UploadFile|null $mainImage
 * @method static \Illuminate\Database\Eloquent\Builder|Blog active()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog latest()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereSmallContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereVisibilityDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereVisibilityDateTo($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property \Illuminate\Support\Carbon $visibility_date_from
 * @property \Illuminate\Support\Carbon $visibility_date_to
 * @property bool $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment active()
 * @method static \Database\Factories\CommentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereVisibilityDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereVisibilityDateTo($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property bool $is_enable
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Description
 *
 * @property int $id
 * @property string $key
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Description active()
 * @method static \Database\Factories\DescriptionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Description newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Description query()
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Description whereUpdatedAt($value)
 */
	class Description extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Package
 *
 * @property int $id
 * @property int $package_type_id
 * @property string $name
 * @property string $price
 * @property string $quantityA
 * @property string $quantityB
 * @property string $quantityC
 * @property int $sms
 * @property bool $position
 * @property bool $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Package active()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Query\Builder|Package onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereQuantityA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereQuantityB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereQuantityC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Package withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Package withoutTrashed()
 */
	class Package extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PackageType
 *
 * @property int $id
 * @property string $title
 * @property int $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|PackageType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PackageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PackageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PackageType withoutTrashed()
 */
	class PackageType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $content
 * @property \Illuminate\Support\Carbon $visibility_date_from
 * @property \Illuminate\Support\Carbon $visibility_date_to
 * @property bool $is_enable
 * @property bool $is_system
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\UploadFile|null $mainImage
 * @method static \Illuminate\Database\Eloquent\Builder|Page active()
 * @method static \Database\Factories\PageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Query\Builder|Page onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereVisibilityDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereVisibilityDateTo($value)
 * @method static \Illuminate\Database\Query\Builder|Page withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Page withoutTrashed()
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parcel
 *
 * @property int $id
 * @property int $package_sender_id
 * @property int $package_revicer_id
 * @property int $package_id
 * @property string $package_type
 * @property string $price
 * @property string $shipment_date
 * @property string $sender_name
 * @property string $sender_surname
 * @property string|null $sender_phone
 * @property string $sender_email
 * @property string|null $sender_street
 * @property string|null $sender_city
 * @property string|null $sender_postal_code
 * @property string|null $sender_inpost_parcel_locker
 * @property string $revicer_name
 * @property string $revicer_surname
 * @property string|null $revicer_phone
 * @property string $revicer_email
 * @property string|null $revicer_street
 * @property string|null $revicer_city
 * @property string|null $revicer_postal_code
 * @property string|null $revicer_inpost_parcel_locker
 * @property string|null $type_of_delivery
 * @property string|null $shipping_method
 * @property string|null $size_of_shipment
 * @property string|null $shipment_value
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $sms_send_date
 * @property bool $is_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel active()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel newQuery()
 * @method static \Illuminate\Database\Query\Builder|Parcel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel wherePackageRevicerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel wherePackageSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel wherePackageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerInpostParcelLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereRevicerSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderInpostParcelLocker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderPostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSenderSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereShipmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereShipmentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSizeOfShipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereSmsSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereTypeOfDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parcel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Parcel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Parcel withoutTrashed()
 */
	class Parcel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Partner
 *
 * @property int $id
 * @property string $name
 * @property int $position
 * @property string|null $file_name
 * @property bool $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Partner active()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Partner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Partner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Partner withoutTrashed()
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string|null $session_id
 * @property string|null $amount
 * @property string|null $currency
 * @property string|null $description
 * @property string|null $email
 * @property string|null $client
 * @property string|null $sign
 * @property string|null $operation_status
 * @property int $price_list_id
 * @property int $price_list_option
 * @property bool $is_payment_parcel
 * @property bool $is_return_package
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereIsPaymentParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereIsReturnPackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereOperationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePriceListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePriceListOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Payment withoutTrashed()
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Province
 *
 * @property int $id
 * @property string $name
 * @property bool $is_enable
 * @method static \Illuminate\Database\Eloquent\Builder|Province active()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property int $key
 * @property array $value
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShippedParcel
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $receiver_city
 * @property string|null $receiver_post_code
 * @property string|null $receiver_country_code
 * @property string|null $receiver_street
 * @property string|null $receiver_building_number
 * @property string|null $receiver_phone
 * @property string|null $receiver_email
 * @property string|null $receiver_first_name
 * @property string|null $receiver_last_name
 * @property string|null $receiver_company_name
 * @property string|null $receiver_address
 * @property string|null $sender_city
 * @property string|null $sender_post_code
 * @property string|null $sender_country_code
 * @property string|null $sender_street
 * @property string|null $sender_building_number
 * @property string|null $sender_phone
 * @property string|null $sender_email
 * @property string|null $sender_first_name
 * @property string|null $sender_last_name
 * @property string|null $sender_address
 * @property bool $is_return
 * @property int $shipping_method
 * @property int $package_type
 * @property int $package_size
 * @property int $shipping_company
 * @property string|null $order_description
 * @property string|null $order_sending_parcel
 * @property string|null $order_recipient_parcel
 * @property string|null $inpost_shipment_id
 * @property string|null $inpost_tracking_number
 * @property string|null $inpost_parcel_height
 * @property string|null $inpost_parcel_length
 * @property string|null $inpost_parcel_width
 * @property string|null $inpost_label_file_name
 * @property string|null $payment_token
 * @property string $ip
 * @property int $is_return_customer
 * @property int $is_payment_shipment
 * @property int $payment_status
 * @property int $inpost_is_non_standard
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel newQuery()
 * @method static \Illuminate\Database\Query\Builder|ShippedParcel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostIsNonStandard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostLabelFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostParcelHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostParcelLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostParcelWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostShipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereInpostTrackingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereIsPaymentShipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereIsReturn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereIsReturnCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereOrderDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereOrderRecipientParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereOrderSendingParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel wherePackageSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel wherePackageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel wherePaymentToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverPostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereReceiverStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderPostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereSenderStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereShippingCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippedParcel whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|ShippedParcel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ShippedParcel withoutTrashed()
 */
	class ShippedParcel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string $line1
 * @property string|null $line2
 * @property string $url
 * @property int $position
 * @property string $visibility_date_from
 * @property string $visibility_date_to
 * @property int $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UploadFile|null $mainImage
 * @method static \Illuminate\Database\Eloquent\Builder|Slide active()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide visible()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereVisibilityDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereVisibilityDateTo($value)
 */
	class Slide extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UploadFile
 *
 * @property int $id
 * @property string $path
 * @property string $imageable_type
 * @property int $imageable_id
 * @property string $ip
 * @property string $extension
 * @property int $position
 * @property string|null $description
 * @property bool $is_enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile active()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UploadFile whereUpdatedAt($value)
 */
	class UploadFile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $surname
 * @property string $email
 * @property string|null $phone
 * @property string|null $street
 * @property string|null $building_number
 * @property string|null $city
 * @property string|null $postal_code
 * @property string|null $shipping_default_inpost_parcel
 * @property string|null $revicer_default_inpost_parcel
 * @property string|null $file_name
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_step_authorization_token
 * @property bool $is_two_step_authorization
 * @property bool $is_enable
 * @property bool $is_company
 * @property string $slug
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserLoginHistory[] $loginHistory
 * @property-read int|null $login_history_count
 * @property-read \App\Models\UploadFile|null $mainImage
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBuildingNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsTwoStepAuthorization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRevicerDefaultInpostParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereShippingDefaultInpostParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoStepAuthorizationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserCode
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCode whereUserId($value)
 */
	class UserCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserCompanySetting
 *
 * @property int $id
 * @property int $user_id
 * @property mixed $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCompanySetting whereUserId($value)
 */
	class UserCompanySetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserLoginHistory
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLoginHistory whereUserId($value)
 */
	class UserLoginHistory extends \Eloquent {}
}

