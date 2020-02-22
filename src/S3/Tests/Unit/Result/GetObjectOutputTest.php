<?php

namespace AsyncAws\S3\Tests\Unit\Result;

use AsyncAws\Core\Test\Http\SimpleMockedResponse;
use AsyncAws\S3\Result\GetObjectOutput;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;

class GetObjectOutputTest extends TestCase
{
    public function testGetObjectOutput(): void
    {
        self::markTestIncomplete('Not implemented');

        $response = new SimpleMockedResponse('<?xml version="1.0" encoding="UTF-8"?>
            <ChangeIt/>
        ');

        $result = new GetObjectOutput($response, new MockHttpClient());

        // self::assertTODO(expected, $result->getBody());
        self::assertFalse($result->getDeleteMarker());
        self::assertStringContainsString('change it', $result->getAcceptRanges());
        self::assertStringContainsString('change it', $result->getExpiration());
        self::assertStringContainsString('change it', $result->getRestore());
        // self::assertTODO(expected, $result->getLastModified());
        self::assertSame(1337, $result->getContentLength());
        self::assertStringContainsString('change it', $result->getETag());
        self::assertSame(1337, $result->getMissingMeta());
        self::assertStringContainsString('change it', $result->getVersionId());
        self::assertStringContainsString('change it', $result->getCacheControl());
        self::assertStringContainsString('change it', $result->getContentDisposition());
        self::assertStringContainsString('change it', $result->getContentEncoding());
        self::assertStringContainsString('change it', $result->getContentLanguage());
        self::assertStringContainsString('change it', $result->getContentRange());
        self::assertStringContainsString('change it', $result->getContentType());
        // self::assertTODO(expected, $result->getExpires());
        self::assertStringContainsString('change it', $result->getWebsiteRedirectLocation());
        self::assertStringContainsString('change it', $result->getServerSideEncryption());
        // self::assertTODO(expected, $result->getMetadata());
        self::assertStringContainsString('change it', $result->getSSECustomerAlgorithm());
        self::assertStringContainsString('change it', $result->getSSECustomerKeyMD5());
        self::assertStringContainsString('change it', $result->getSSEKMSKeyId());
        self::assertStringContainsString('change it', $result->getStorageClass());
        self::assertStringContainsString('change it', $result->getRequestCharged());
        self::assertStringContainsString('change it', $result->getReplicationStatus());
        self::assertSame(1337, $result->getPartsCount());
        self::assertSame(1337, $result->getTagCount());
        self::assertStringContainsString('change it', $result->getObjectLockMode());
        // self::assertTODO(expected, $result->getObjectLockRetainUntilDate());
        self::assertStringContainsString('change it', $result->getObjectLockLegalHoldStatus());
    }

    public function testMetadata()
    {
        $headers = [
            'x-amz-id-2' => [0 => 'wHaofDPIxs4VoML+wxIjs/V+2Ke0B2bi6vDA6OPJctaYf2XgXJpdXCnuOTL0pPoQ48zMhL+fZXo='],
            'x-amz-request-id' => [0 => '29A72C65D02ED350'],
            'date' => [0 => 'Sat, 08 Feb 2020 15:58:09 GMT'],
            'last-modified' => [0 => 'Sat, 08 Feb 2020 15:55:28 GMT'],
            'etag' => [0 => '"9a0364b9e99bb480dd25e1f0284c8555"'],
            'x-amz-meta-tobias' => [0 => 'nyholm'],
            'accept-ranges' => [0 => 'bytes'],
            'content-type' => [0 => 'application/x-www-form-urlencoded'],
            'content-length' => [0 => '7'],
            'connection' => [0 => 'close'],
            'server' => [0 => 'AmazonS3'],
        ];
        $response = new SimpleMockedResponse('content', $headers);
        $result = new GetObjectOutput($response, new MockHttpClient());

        $metadata = $result->getMetadata();
        self::assertCount(1, $metadata);
        self::assertArrayHasKey('x-amz-meta-tobias', $metadata);
        self::assertEquals('nyholm', $metadata['x-amz-meta-tobias']);
    }
}
