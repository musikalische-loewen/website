# Liquid filter that returns the width and height attributes of a WebP image,
# e.g. {{ "/images/archive/small/foo.webp" | webp_size }} => width="640" height="424".
# With these attributes browsers reserve the space of lazy-loaded images,
# so that Masonry can lay out the cards before the images are loaded.
module Jekyll
  module WebpSize
    def webp_size(path)
      site = @context.registers[:site]
      data = File.binread(File.join(site.source, path), 30)
      case data[12, 4]
      when "VP8 "
        width = data[26, 2].unpack1("v") & 0x3fff
        height = data[28, 2].unpack1("v") & 0x3fff
      when "VP8L"
        bits = data[21, 4].unpack1("V")
        width = (bits & 0x3fff) + 1
        height = ((bits >> 14) & 0x3fff) + 1
      when "VP8X"
        width = (data[24, 3] + "\0").unpack1("V") + 1
        height = (data[27, 3] + "\0").unpack1("V") + 1
      else
        return ""
      end
      %(width="#{width}" height="#{height}")
    end
  end
end

Liquid::Template.register_filter(Jekyll::WebpSize)
