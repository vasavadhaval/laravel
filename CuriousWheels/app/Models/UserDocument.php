<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'document_type_id',
        'file_path',
        'description',
        'is_approved', // Field to store document approval status
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    // Accessor for approval status with comments (optional)

    public static function scopeHasDocumentOfType($query, $userId, $documentTypeId)
    {
        return $query->where('user_id', $userId)
                    ->where('document_type_id', $documentTypeId)
                    ->exists();
    }
}
